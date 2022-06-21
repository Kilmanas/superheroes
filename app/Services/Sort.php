<?php

namespace App\Services;

use App\Models\Superhero;

class Sort
{
    public static function sort($request)
    {
        if($request->has('sort') && !empty($request->post('sort'))){
            $powerstat=substr($request->input('sort'), 0, strpos($request->input('sort'), '.'));
            if($request->input('sort')=="intelligence.asc"){
                $superheroes = Superhero::orderBy($powerstat)->get();
            }elseif($request->input('sort')=="intelligence.desc") {
                $superheroes = Superhero::orderBy($powerstat, 'desc')->get();
            }elseif($request->input('sort')=="strength.asc") {
                $superheroes = Superhero::orderBy($powerstat)->get();
            }elseif($request->input('sort')=="strength.desc") {
                $superheroes = Superhero::orderBy($powerstat, 'desc')->get();
            }elseif($request->input('sort')=="speed.asc") {
                $superheroes = Superhero::orderBy($powerstat)->get();
            }elseif($request->input('sort')=="speed.desc") {
                $superheroes = Superhero::orderBy($powerstat, 'desc')->get();
            }elseif($request->input('sort')=="durability.asc") {
                $superheroes = Superhero::orderBy($powerstat)->get();
            }elseif($request->input('sort')=="durability.desc") {
                $superheroes = Superhero::orderBy($powerstat, 'desc')->get();
            }elseif($request->input('sort')=="power.asc") {
                $superheroes = Superhero::orderBy($powerstat)->get();
            }elseif($request->input('sort')=="power.desc") {
                $superheroes = Superhero::orderBy($powerstat, 'desc')->get();
            }elseif($request->input('sort')=="combat.asc") {
                $superheroes = Superhero::orderBy($powerstat)->get();
            }elseif($request->input('sort')=="combat.desc") {
                $superheroes = Superhero::orderBy($powerstat, 'desc')->get();
            }
        }else {
            $superheroes = Superhero::all();
            $powerstat = 'intelligence';
        }
        return [$superheroes,$powerstat];
    }
}
