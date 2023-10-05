<?php

namespace Database\Seeders;

use App\Models\Arriving;
use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArrivingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicle = Vehicle::where([
            'patent' => 'AB1234'
        ])->first();

        if ($vehicle) {
            Arriving::create([
                'name' => 'jose',
                'surname' => 'munoz',
                'lastname' => 'jesus',
                'rut' => '206135549',
                'patent' => $vehicle->patent,
                'email' => 'jose@gmail.com',
                'fechaEntrega' => '02022005',
                'fechaDevolucion' => '15022005'
            ]);

        }

        $vehicle2 = Vehicle::where([
            'patent' => 'IJ7890'
        ])->first();

        if ($vehicle2) {
            Arriving::create([
                'name' => 'maria',
                'surname' => 'sanchez',
                'lastname' => 'lopez',
                'rut' => '123456789',
                'patent' => $vehicle2->patent,
                'email' => 'maria@gmail.com',
                'fechaEntrega' => '03032005',
                'fechaDevolucion' => '16032005'
            ]);

        }
    }
}
