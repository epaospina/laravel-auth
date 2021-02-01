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

    public function loadOrder()
    {
        return $this->belongsTo('App\LoadOrders', "load_orders_id");
    }

    static function findBy($parameter){
        return self::all()->where('vin', $parameter)->first();
    }

    static function findOrCreateInformationCar($client, $infoCars, $loadOrder, $carID = null)
    {
        foreach ($infoCars as $infoCar) {
            $informationCar = new InformationCar();
            if (isset($infoCar['vin_original'])){
                $informationCar = self::findBy($infoCar['vin_original']);
            }

            if (!is_null($carID)) {
                $informationCar = InformationCar::query()->find($carID);
            }
            self::infoArray($informationCar, $infoCar, $client, $loadOrder);
        }
    }

    static function infoArray($informationCar, $infoCar, $client, $loadOrder){
        $informationCar->marca = $infoCar['marca_car'];
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
    }
}
