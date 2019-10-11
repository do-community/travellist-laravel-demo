<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Place;
use App\Photo;

Route::get('/', function () {

    $visited = Place::where('visited', 1)->get();
    $togo = Place::where('visited', 0)->get();

    $files = Storage::disk('public')->files('/photos');
    $photos = [];
    foreach ($files as $file) {
        $photos[] = [ 'file' => $file, 'url' => Storage::disk('public')->url($file) ];
    }
    
    return view('travel_list', ['visited' => $visited, 'togo' => $togo, 'photos' => $photos ] );
})->name('Main');