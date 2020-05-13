<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PlacesList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'places:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all current places.';

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
        $places = DB::select('select * from places');
        $table_content = [];

        foreach ($places as $place) {

            $table_content[] = [
                $place->name,
                $place->visited ? "yes" : "no"
            ];
        }

        $this->table(["Place", "Visited"], $table_content);
    }
}
