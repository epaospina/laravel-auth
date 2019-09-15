<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformationCar extends Model
{
    protected $table = 'information_car';

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    static function findBy($parameter){
        return self::all()->where('vin', $parameter)->first();
    }

    static function findOrCreateInformationCar($client, $infoCars)
    {
        foreach ($infoCars as $infoCar) {
            $informationCar = new InformationCar();
            if (isset($infoCar['vin_original'])){
                $informationCar = self::findBy($infoCar['vin_original']);
            }

            self::infoArray($informationCar, $infoCar, $client);
        }
    }

    static function infoArray($informationCar, $infoCar, $client){
        $informationCar->model_car = $infoCar['model_car'];
        $informationCar->color_car = $infoCar['color_car'];
        $informationCar->vin = $infoCar['vin'];
        $informationCar->documents = $infoCar['documents'];
        $informationCar->customer_id = $client->id;
        $informationCar->save();

        return $informationCar;
    }
}
