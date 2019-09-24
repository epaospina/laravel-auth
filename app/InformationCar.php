<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

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
        $saveCars = false;
        foreach ($infoCars as $infoCar) {
            $informationCar = new InformationCar();
            if (isset($infoCar['vin_original'])){
                $informationCar = self::findBy($infoCar['vin_original']);
            }

            $saveCars = self::infoArray($informationCar, $infoCar, $client);
        }

        return $saveCars;
    }

    static function infoArray($informationCar, $infoCar, $client){
        $validator = Validator::make($infoCar, [
            'vin' => 'required|unique:information_car|max:255',
        ]);

        $informationCar->model_car = $infoCar['model_car'];
        $informationCar->color_car = $infoCar['color_car'];
        $informationCar->vin = $infoCar['vin'];
        $informationCar->documents = $infoCar['documents'];
        $informationCar->customer_id = $client->id;

        if (!$validator->fails()){
            $informationCar->save();
            return $informationCar;
        };

        return false;

    }
}
