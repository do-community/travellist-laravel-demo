<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PlacesRemove extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'places:remove {place}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes a place from the travel list.';

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

        DB::select('delete from places where name = ?', [$place]);
        $this->info("$place removed.");
    }
}
