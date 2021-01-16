<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataDownload extends Model
{
    protected $table = 'data_download';

    public function countries()
    {
        return $this->belongsTo('App\Countries');
    }

    static public function validateDataDownload($info){
        $dataDownload = [
            'signing_download'    => isset($info['data_download']['signing_download']) ? $info['data_download']['signing_download'] : '',
            'addresses_download'  => isset($info['data_download']['addresses_download']) ? $info['data_download']['addresses_download'] : '',
            'city_download'       => isset($info['data_download']['city_download']) ? $info['data_download']['city_download'] : '',
            'postal_cod_download' => isset($info['data_download']['postal_cod_download']) ? $info['data_download']['postal_cod_download'] : 1,
            'contact_download'    => isset($info['data_download']['contact_download']) ? $info['data_download']['contact_download'] : '',
            'observations'        => isset($info['data_download']['observations']) ? $info['data_download']['observations'] : '',
            'mobile_download'     => isset($info['data_download']['mobile_download ']) ? $info['data_download']['mobile_download '] : '',
        ];

        if (auth()->id()){
            $dataDownload['driver_data'] = isset($info['data_download']['driver_data']) ? $info['data_download']['driver_data'] : '';
            $dataDownload['cmr'] = isset($info['data_download']['cmr']) ? $info['data_download']['cmr'] : '';
        }

        return $dataDownload;
    }
}
