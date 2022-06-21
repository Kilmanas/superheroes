<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class Pagination
{
    public static function pagination($superheroes, $request)
    {
        $total=count($superheroes);
        $per_page = 10;
        $current_page = $request->input("page") ?? 1;
        $starting_point = ($current_page * $per_page) - $per_page;
        $superheroes = $superheroes->slice($starting_point, $per_page);
        $pagination = new Paginator($superheroes, $total, $per_page, $current_page, [
            'path' => $request->url(),
            'query' => $request->query(),
        ]);
        return [$superheroes, $pagination];
    }
}
