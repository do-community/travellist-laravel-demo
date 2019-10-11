<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Photo;
use App\Place;

class PlacesTableSeeder extends Seeder
{
    static $places = [
        'Berlin'    => [ 52.52, 13.405 ],
        'Budapest'  => [ 47.4979, 19.0402 ],
        'Cincinati' => [ 39.1031, -84.512 ],
        'Denver'    => [ 39.7392, -104.99 ],
        'Helsinki'  => [ 60.1699, 24.9384 ],
        'Lisbon'    => [ 38.7223, -9.13934 ],
        'Moscow'    => [ 55.7558, 37.6173 ],
        'Nairobi'   => [ -1.29207, 36.8219 ],
        'Oslo'      => [ 59.9139, 10.7522 ],
        'Rio'       => [ -22.9068, -43.1729 ],
        'Tokyo'     => [ 35.6895, 139.692 ],
        'Bermudas'  => [ 32.307800, -64.750504 ],
        'Grindavik' => [ 63.840672, -22.429350 ],
        'Japan'     => [ 36.204823, 138.252930 ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $places = DB::table('places')->count();

        if ($places) {
            echo "'Places' table is not empty.\n";
            exit;
        }

        $this->insertDefaultPlaces();
    }

    protected function insertDefaultPlaces()
    {
         foreach (self::$places as $name => $coords) {
            $place = new Place();
            $place->name = $name;
            $place->lat = $coords[0];
            $place->lng = $coords[1];
            $place->visited = 0;

            $place->save();

            $sample_photo = strtolower($name) . '.jpg';

            if (Storage::disk('local')->exists('/sample_photos/' . $sample_photo)) {
                //check if sample photo was copied before
                if (!Storage::disk('local')->exists('/public/' . $sample_photo)) {
                    //save image to the default public disk
                    Storage::disk()->copy('/sample_photos/' . $sample_photo, '/public/' . $sample_photo);
                }

                $photo = new Photo();
                $photo->image = $sample_photo;

                $place->update(['visited' => 1]);

                $photo->place()->associate($place);
                $photo->save();
            }
        }
    }
}
