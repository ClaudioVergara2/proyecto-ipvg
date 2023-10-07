<?php

namespace Database\Seeders;

use App\Models\Arriving;
use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ArrivingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fechaEntrega = Carbon::createFromFormat('d-m-Y', '02-02-2005')->format('Y-m-d');
        $fechaDevolucion = Carbon::createFromFormat('d-m-Y', '15-02-2005')->format('Y-m-d');

        $vehicle = Vehicle::where([
            'patent' => 'AB1234'
        ])->first();

        if ($vehicle) {
            Arriving::create([
                'name' => 'jose',
                'surname' => 'munoz',
                'lastname' => 'jesus',
                'rut' => '20613554-9',
                'patent' => $vehicle->id,
                'email' => 'jose@gmail.com',
                'fechaEntrega' => $fechaEntrega,
                'fechaDevolucion' => $fechaDevolucion
            ]);

        }

        $fechaEntrega2 = Carbon::createFromFormat('d-m-Y', '01-06-2005')->format('Y-m-d');
        $fechaDevolucion2 = Carbon::createFromFormat('d-m-Y', '20-07-2010')->format('Y-m-d');

        $vehicle2 = Vehicle::where([
            'patent' => 'IJ7890'
        ])->first();

        if ($vehicle2) {
            Arriving::create([
                'name' => 'maria',
                'surname' => 'sanchez',
                'lastname' => 'lopez',
                'rut' => '12345678-9',
                'patent' => $vehicle2->id,
                'email' => 'maria@gmail.com',
                'fechaEntrega' => $fechaEntrega2,
                'fechaDevolucion' => $fechaDevolucion2
            ]);

        }
    }
}
