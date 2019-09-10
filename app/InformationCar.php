<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformationCar extends Model
{
    protected $table = 'information_car';

    public function infoCustomer()
    {
        return $this
            ->belongsToMany('App\InformationCar','customers','customer_id','customer_id')
            ->withTimestamps();
    }

    static function findBy($parameter){
        return self::all()->where('vin', $parameter)->first();
    }

    static function findOrCreateInformationCar($client, $infoCars)
    {
        foreach ($infoCars as $infoCar) {
            $informationCar = self::findBy($infoCar['vin']);
            if (!isset($car)) {
                $informationCar = new InformationCar();
            }

            $informationCar = self::infoArray($informationCar, $infoCar);

            CustomerInformationCar::createClientCar($informationCar->id, $client->id);
        }
    }

    static function infoArray($informationCar, $infoCar){
        $informationCar->model_car = $infoCar['model_car'];
        $informationCar->color_car = $infoCar['color_car'];
        $informationCar->vin = $infoCar['vin'];
        $informationCar->documents = $infoCar['documents'];
        $informationCar->save();

        return $informationCar;
    }
}
