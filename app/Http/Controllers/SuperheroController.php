<?php

namespace App\Http\Controllers;

use App\Models\Superhero;
use App\Http\Requests\StoreSuperheroRequest;
use App\Http\Requests\UpdateSuperheroRequest;
use App\Services\Height;

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
            $data['superheroes'] = Superhero::all()->sortBy($powerstat);
        } else {
            $data['superheroes'] = Superhero::all()->sortByDesc($powerstat);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSuperheroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuperheroRequest $request)
    {
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
            'image_url' => $image,
            'alignment_id' => $alignment,
            'aliases' => $request->post('aliases'),
            ]);
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
        //
    }
}
