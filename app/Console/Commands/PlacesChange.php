<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PlacesChange extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'places:change {place} {visited}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Changes a place from the travel list to "visited" or "to go".';

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
        $visited = $this->argument('visited');

        $status =  0;
        $status_message = "to go";

        if ($visited == "visited" OR $visited == "yes") {
            $status = 1;
            $status_message = "visited";
        }

        DB::select('update places set visited = ? where name = ?', [$status, $place]);
        $this->info("$place marked as '$status_message'.");
    }
}
