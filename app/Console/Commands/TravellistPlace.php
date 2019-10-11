<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;


class TravellistPlace extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'travellist:place {subcommand} {place?} {lat?} {long?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manage Places';

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
        $command = $this->argument('subcommand');
        $place = $this->argument('place');

        $callable = $command . "Command";

        $this->$callable($place);
    }

    protected function listCommand()
    {
        $places = DB::select('select * from places');

        foreach ($places as $place) {
            $visited = 'O';

            if ($place->visited) {
                $visited = 'X';
            }

            $this->info($place->name . ' [' . $visited . ']');
        }
    }

    protected function addCommand()
    {
        $place = $this->getPlace();
        $lat = $this->argument('lat');
        $lng = $this->argument('long');

        if (!$lat || !$lng) {
            $this->error("You must provide latitude and longitude as arguments.");
        }

        DB::select('insert into places(name, lat, lng) VALUES(?, ?, ?)', [$place, $lat, $lng]);
        $this->info("$place added.");
    }

    protected function removeCommand()
    {
        $place = $this->getPlace();

        DB::select('delete from places where name = ?', [$place]);
        $this->info("$place removed.");
    }

    protected function visitedCommand()
    {
        $place = $this->getPlace();

        DB::select('update places set visited = 1 where name = ?', [$place]);
        $this->info("$place marked as visited.");
    }

    protected function togoCommand()
    {
        $place = $this->getPlace();

        DB::select('update places set visited = 0 where name = ?', [$place]);
        $this->info("$place marked as to go.");
    }

    protected function getPlace()
    {
        $place = $this->argument('place');
        if (!$place) {
            $this->error('You must provide a place.');
            exit;
        }

        return $place;
    }
}
