<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuperheroRequest;
use App\Http\Requests\UpdateSuperheroRequest;
use App\Models\Alignment;
use App\Models\Image as ImageModel;
use App\Models\Superhero;
use App\Services\Height;
use App\Services\Pagination;
use App\Services\Sort;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;


class SuperheroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $powerstat = Sort::sort($request)[1];
        $superheroes = Sort::sort($request)[0];
        $pagination = Pagination::pagination($superheroes, $request)[1];
        $superheroes = Pagination::pagination($superheroes, $request)[0];

        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $superheroes = Superhero::where('name', 'like', "%$search%")->cursorPaginate(10);
        }

        return view('superheroes.list', [
            'superheroes' => $superheroes,
            'pagination' => $pagination,
            'powerstat' => $powerstat,
        ]);
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
     * @param \App\Http\Requests\StoreSuperheroRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuperheroRequest $request)
    {
        $filename = $request->post('name');
        $smPath = 'images/sm' . "/" . $filename;
        Image::make($request->file('image'))->resize(160, 240)->save($smPath, 90, 'png');
        $lgPath = 'images/lg' . "/" . $filename;
        Image::make($request->file('image'))->resize(480, 640)->save($lgPath, 90, 'png');
        $image = new ImageModel();
        $image->sm_img_url = $smPath;
        $image->lg_img_url = $lgPath;
        $image->save();
        $superhero = new Superhero();
        $superhero->user_created = 1;
        $superhero->name = $request->post('name');
        $superhero->intelligence = $request->post('intelligence');
        $superhero->strength = $request->post('strength');
        $superhero->speed = $request->post('speed');
        $superhero->durability = $request->post('durability');
        $superhero->power = $request->post('power');
        $superhero->combat = $request->post('combat');
        $superhero->height = $request->post('height');
        $superhero->weight = $request->post('weight');
        $superhero->image_id = $image->id;
        $superhero->alignment_id = $request->post('alignment');
        $superhero->aliases = $request->post('aliases');
        $superhero->save();

        return redirect(route('superhero.show', $superhero->id));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Superhero $superhero
     * @return \Illuminate\Http\Response
     */
    public function show(Superhero $superhero)
    {
        $data['superhero'] = $superhero;
        $height = Height::convert($superhero);
        return view('superheroes.show', $data)->with('height', $height);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Superhero $superhero
     * @return \Illuminate\Http\Response
     */
    public function edit(Superhero $superhero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateSuperheroRequest $request
     * @param \App\Models\Superhero $superhero
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuperheroRequest $request, Superhero $superhero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Superhero $superhero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Superhero $superhero)
    {
        $superhero->delete();
        return redirect(route('superhero.index'));
    }
}
