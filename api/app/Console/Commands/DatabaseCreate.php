<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class DatabaseCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create database if does not exist';

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

        $dbConnection = env('DB_CONNECTION');
        $dbDatabase = env('DB_DATABASE');
        Config::set('database.connections.' . $dbConnection . '.database', null);            

        try {
            DB::purge($dbConnection);
            DB::connection($dbConnection)->statement('CREATE DATABASE ' . $dbDatabase);
            DB::purge($dbConnection);        
            $this->info('Database ' . $dbDatabase . ' created successfully.');            
        }
        catch(\Exception $e) {
           $this->comment($e->getMessage());            
        }

        Config::set('database.connections.' . $dbConnection . '.database', $dbDatabase);            
    }
}
