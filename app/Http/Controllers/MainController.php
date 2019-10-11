<?php

namespace App\Http\Controllers;

use App\Place;
use App\Photo;

class MainController extends Controller
{
    public function main()
    {
        $visited = Place::where('visited', 1)->get();
        $togo = Place::where('visited', 0)->get();

        $photos = Photo::all();

        return view('travel_list', [
            'visited' => $visited,
            'togo' => $togo,
            'photos' => $photos
        ]);
    }
}
