<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlacesTableSeeder extends Seeder
{
    static $places = [
        'Berlin',
        'Budapest',
        'Cincinnati',
        'Denver',
        'Helsinki',
        'Lisbon',
        'Moscow',
        'Nairobi',
        'Oslo',
        'Rio',
        'Tokyo'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$places as $place) {
            DB::table('places')->insert([
                'name' => $place,
                'visited' => rand(0,1) == 1
            ]);
        }
    }
}
