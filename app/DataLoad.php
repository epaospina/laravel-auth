<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataLoad extends Model
{
    protected $table = 'data_load';

    static public function validateDataLoad($info){
        $dataLoad = [
            'addresses_load'   => isset($info['data_load']['addresses_load']) ? $info['data_load']['addresses_load'] : '',
            'city_load'        => isset($info['data_load']['city_load']) ? $info['data_load']['city_load'] : '',
            'postal_cod_load'  => isset($info['data_load']['postal_cod_load']) ? $info['data_load']['postal_cod_load'] : '',
            'phone_load'       => isset($info['data_load']['phone_load']) ? $info['data_load']['phone_load'] : '',
            'mobile_load'      => isset($info['data_load']['mobile_load']) ? $info['data_load']['mobile_load'] : '',
        ];

        return $dataLoad;
    }
}
