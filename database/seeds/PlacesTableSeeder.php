<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlacesTableSeeder extends Seeder
{
    static $places = [
        'Berlin'     => [ 52.52, 13.405 ],
        'Budapest'   => [ 47.4979, 19.0402 ],
        'Cincinnati' => [ 39.1031, -84.512 ],
        'Denver'     => [ 39.7392, -104.99 ],
        'Helsinki'   => [ 60.1699, 24.9384 ],
        'Lisbon'     => [ 38.7223, -9.13934 ],
        'Moscow'     => [ 55.7558, 37.6173 ],
        'Nairobi'    => [ -1.29207, 36.8219 ],
        'Oslo'       => [ 59.9139, 10.7522 ],
        'Rio'        => [ -22.9068, -43.1729 ],
        'Tokyo'      => [ 35.6895, 139.692 ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$places as $place => $coords) {
            DB::table('places')->insert([
                'name' => $place,
                'visited' => rand(0,1) == 1,
                'lat' => $coords[0],
                'lng' => $coords[1]
            ]);
        }
    }
}
