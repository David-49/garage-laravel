<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Vehicle;


class InfoVehcile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:InfoVehicle {--full}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Affiche les info des véhicules si options full';

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
        $fullOption = $this->option('full');
        $id = $this->ask('Rentrer un id');
        $vehicle = Vehicle::find($id);
        if($vehicle !== null) {
            if($fullOption === true) {
            $this->table(
                array_keys($vehicle->toArray()), [$vehicle->toArray()]
            );
            } else {
               $this->table(
                ['id','name'], [[$vehicle->id, $vehicle->name]]
                );
            }
        } else {
            $this->line('Ce véhicule n\'existe pas');
        }
    }
}
