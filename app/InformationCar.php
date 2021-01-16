<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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

    static function findOrCreateInformationCar($client, $infoCars, $loadOrder)
    {
        $saveCars = false;
        foreach ($infoCars as $infoCar) {
            $informationCar = new InformationCar();
            $valid = true;
            if (isset($infoCar['vin_original'])){
                $informationCar = self::findBy($infoCar['vin_original']);
                $valid = false;
            }

            $saveCars = self::infoArray($informationCar, $infoCar, $client, $valid, $loadOrder);
        }

        return $saveCars;
    }

    static function infoArray($informationCar, $infoCar, $client, $valid, $loadOrder){
        $validator = false;

        if ($valid){
            $validator = Validator::make($infoCar, [
                'vin' => [
                    'required',
                    'max:255',
                    Rule::unique('information_car')->where('status', 1),
                ]
            ]);
        }

        $informationCar->color_car = $infoCar['color_car'];
        $informationCar->model_car = $infoCar['model_car'];
        $informationCar->vin = $infoCar['vin'];
        $informationCar->plate_number = $infoCar['plate_number'];
        if (isset($infoCar['documents'])){
            $informationCar->documents = !is_null($infoCar['documents']) ? $infoCar['documents'] : '';
        }else{
            $informationCar->documents = '';
        }

        $informationCar->customer_id = $client->id;
        $informationCar->load_orders_id = $loadOrder->id;
        $informationCar->save();

        return false;
    }
}
