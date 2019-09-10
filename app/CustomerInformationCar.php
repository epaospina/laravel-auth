<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerInformationCar extends Model
{
    protected $table = 'customer_information_car';

   static function existClientCar($information_car_id, $client_id){
        $varBool = self::all()
            ->where('customer_id', $client_id)
            ->where('information_car_id', $information_car_id);

        return !empty($varBool);
    }

    static function createClientCar($information_car_id, $client_id){
        if (self::existClientCar($information_car_id, $client_id)){
            $clientCar = new CustomerInformationCar();
            $clientCar->customer_id = $client_id;
            $clientCar->information_car_id = $information_car_id;
            $clientCar->save();
        }
    }
}
