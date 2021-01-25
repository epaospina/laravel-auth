<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataLoad extends Model
{
    protected $table = 'data_load';

    static public function validateDataLoad($info){
        $mobileLoad = isset($info['data_load']['mobile_load']) ? $info['data_load']['mobile_load'] : null;
        if (is_null($mobileLoad)) {
            $mobileLoad = isset($info['data_load']['phone_load']) ? $info['data_load']['phone_load'] : null;
        }
        $dataLoad = [
            'signing'    => isset($info['client']['signing']) ? $info['client']['signing'] : '',
            'addresses_load'  => isset($info['data_load']['addresses_load']) ? $info['data_load']['addresses_load'] : '',
            'city_load'       => isset($info['data_load']['city_load']) ? $info['data_load']['city_load'] : '',
            'postal_cod_load' => isset($info['data_load']['postal_cod_load']) ? $info['data_load']['postal_cod_load'] : 1,
            'data_load'       => isset($info['load_order']['contact_person']) ? $info['load_order']['contact_person'] : '',
            'mobile_load'     => $mobileLoad,
        ];

        return $dataLoad;
    }
}
