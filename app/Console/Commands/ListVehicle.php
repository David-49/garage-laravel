<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Vehicle;

class ListVehicle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vehicle:Display';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Afficher la liste des véhicules si l\'utilisateur le souhaite.';

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
     * @return int
     */
    public function handle()
    {
        if($this->confirm('Afficher la liste des véhicules')) {
            $this->table(
                ['id','name'], Vehicle::all(['id','name'])->toArray()
            );
        }
    }
}
