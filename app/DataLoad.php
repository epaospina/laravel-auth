<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataLoad extends Model
{
    protected $table = 'data_load';

    static public function validateDataLoad($info){
        $dataLoad = [
            'date_load'        => isset($info['data_load']['date_load']) ? $info['data_load']['date_load'] : '',
            'addresses_load'   => isset($info['data_load']['addresses_load']) ? $info['data_load']['addresses_load'] : '',
            'country_load'     => isset($info['data_load']['city_load']) ? $info['data_load']['countries_id'] : 1,
            'city_load'        => isset($info['data_load']['city_load']) ? $info['data_load']['city_load'] : '',
            'postal_cod_load'  => isset($info['data_load']['postal_cod_load']) ? $info['data_load']['postal_cod_load'] : '',
            'phone_load'       => isset($info['data_load']['phone_load']) ? $info['data_load']['phone_load'] : '',
            'mobile_load'      => isset($info['data_load']['mobile_load']) ? $info['data_load']['mobile_load'] : '',
        ];

        return $dataLoad;
    }
}
