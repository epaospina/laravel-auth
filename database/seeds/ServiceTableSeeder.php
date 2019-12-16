<?php

use App\Services;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = new Services();
        $service->nombre = 'PORTE DE VEHICULOS';
        $service->precio = '80';
        $service->save();
    }
}
