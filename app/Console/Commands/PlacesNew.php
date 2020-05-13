<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PlacesNew extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'places:new {place} {lat} {lng}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a new place to the travel list.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $place = $this->argument('place');
        $lat = $this->argument('lat');
        $lng = $this->argument('lng');

        DB::select('insert into places(name, lat, lng) VALUES(?, ?, ?)', [$place, $lat, $lng]);
        $this->info("$place added.");
    }
}
