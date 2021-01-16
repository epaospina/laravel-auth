<?php

use App\Countries;
use Illuminate\Database\Seeder;

class CountriesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = new Countries();
        $country->id = 1;
        $country->country = 'España';
        $country->save();
        $country = new Countries();
        $country->id = 2;
        $country->country = 'Alemania';
        $country->save();
        $country = new Countries();
        $country->id = 3;
        $country->country = 'Austria';
        $country->save();
        $country = new Countries();
        $country->id = 4;
        $country->country = 'Bélgica';
        $country->save();
        $country = new Countries();
        $country->id = 5;
        $country->country = 'Bulgaria';
        $country->save();
        $country = new Countries();
        $country->id = 6;
        $country->country = 'Francia';
        $country->save();
        $country = new Countries();
        $country->id = 7;
        $country->country = 'Holanda';
        $country->save();
        $country = new Countries();
        $country->id = 8;
        $country->country = 'Italia';
        $country->save();
        $country = new Countries();
        $country->id = 9;
        $country->country = 'Portugal';
        $country->save();
        $country = new Countries();
        $country->id = 10;
        $country->country = 'Grecia';
        $country->save();
        $country = new Countries();
        $country->id = 11;
        $country->country = 'Hungría';
        $country->save();
        $country = new Countries();
        $country->id = 12;
        $country->country = 'Polonia';
        $country->save();
        $country = new Countries();
        $country->id = 13;
        $country->country = 'Rumania';
        $country->save();
    }
}
