<?php

namespace App\Http\Controllers;

use App\Models\Alignment;
use App\Models\Powerstat;
use App\Models\Superhero;
use App\Http\Requests\StoreSuperheroRequest;
use App\Http\Requests\UpdateSuperheroRequest;
use App\Services\Height;
use Intervention\Image\ImageManagerStatic as Image;


class SuperheroController extends Controller
{
    private $powerstats = 'Intelligence';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(isset($_GET['powerstat']) && !empty($_GET['powerstat'])){
            $_GET['powerstat'] = strtolower($_GET['powerstat']);
            $params = explode(',', $_GET['powerstat']);
            $sort = $params[1];
            $powerstat = $params[0];
        } else {
            $powerstat = strtolower($this->powerstats);
            $sort = 'desc';
        }
        if($sort == 'asc'){
            $data['superheroes'] = Superhero::orderBy($powerstat, 'asc')->paginate(10);
        } else {
            $data['superheroes'] = Superhero::orderBy($powerstat, 'desc')->paginate(10);
        }
        if (isset($_GET['search'])){
            $search = $_GET['search'];
            $data['superheroes'] = Superhero::where('name', 'like' , "%$search%")->paginate(10);
        }

        return view('superheroes.list', $data) -> with('powerstat', $powerstat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['alignments'] = Alignment::all();
        return view('superheroes.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSuperheroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuperheroRequest $request)
    {
        $extension = '.png';
        $filename = $request->post('name').$extension;
        $smPath = 'images/sm'."/".$filename;
        Image::make($request->file('image'))->resize(160, 240)->save($smPath);
        $lgPath = 'images/lg'."/".$filename;
        Image::make($request->file('image'))->resize(480, 640)->save($lgPath);
        $superhero = Superhero::create([
            'name' => $request->post('name'),
            'intelligence' => $request->post('intelligence'),
            'strength' => $request->post('strength'),
            'speed' => $request->post('speed'),
            'durability' => $request->post('durability'),
            'power' => $request->post('power'),
            'combat' => $request->post('combat'),
            'height' => $request->post('height'),
            'weight' => $request->post('weight'),
            'image_sm_url' => $smPath,
            'image_lg_url' => $lgPath,
            'alignment_id' => $request->post('alignment'),
            'aliases' => $request->post('aliases'),
            ]);
        return redirect(route('superhero.show', $superhero->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Superhero  $superhero
     * @return \Illuminate\Http\Response
     */
    public function show(Superhero $superhero, Height $height)
    {
        $data['superhero'] = $superhero;
        $height = $height->convert($superhero);
        return view('superheroes.show', $data) -> with('height', $height);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Superhero  $superhero
     * @return \Illuminate\Http\Response
     */
    public function edit(Superhero $superhero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSuperheroRequest  $request
     * @param  \App\Models\Superhero  $superhero
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuperheroRequest $request, Superhero $superhero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Superhero  $superhero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Superhero $superhero)
    {
        $superhero->delete();
        return redirect(route('superhero.index'));
    }

    public function search()
    {
        if (isset($_GET['search'])){
            $search = $_GET['search'];
            $data['superheroes'] = Superhero::where('name', 'like' , "%$search%")->paginate(10);
        }
    }
}
