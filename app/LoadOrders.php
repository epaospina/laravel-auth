<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class LoadOrders extends Model
{
    protected $table = 'load_orders';

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function data_download()
    {
        return $this->hasOne('App\DataDownload');
    }

    public function bill()
    {
        return $this->hasOne('App\Bills');
    }

    static function assignHash($hash){
        $loadOrder = LoadOrders::all()->where('hash', $hash)->first();

        return $loadOrder;
    }
    static function createAllLoadOrder($infoArray, $hash = null){
        $loadOrder = self::assignHash($hash);
        if (empty($loadOrder)){
            $loadOrder = new LoadOrders();
        }

        $client = new Customer();
        $data_download = new DataDownload();

        if (!empty($loadOrder) && !empty($loadOrder->customer)){
            $client = $loadOrder->customer;
        }

        $client->signing = $infoArray['signing'];
        $client->addresses_load = $infoArray['addresses_load'];
        $client->city_load = $infoArray['city_load'];
        $client->postal_cod_load = $infoArray['postal_cod_load'];
        $client->phone_load = $infoArray['phone_load'];
        $client->mobile_load = $infoArray['mobile_load'];
        $client->fax = $infoArray['fax'];
        $client->save();

        InformationCar::findOrCreateInformationCar($client, $infoArray["car"]);

        $loadOrder->customer_id = $client->id;
        $loadOrder->contact_person = $infoArray['contact_person'];
        $loadOrder->date_upload = Carbon::now();
        $loadOrder->bill_to = $infoArray['bill_to'];
        $loadOrder->payment_type = $infoArray['payment_type'];
        $loadOrder->import_company = $infoArray['import_company'];
        $loadOrder->save();

        $loadOrder->hash = md5($loadOrder->id);
        $loadOrder->save();

        if (!empty($loadOrder) && !empty($loadOrder->dataDownload)){
            $data_download = $loadOrder->data_download;
        }

        $data_download->addresses_download = $infoArray['addresses_download'];
        $data_download->city_download = $infoArray['city_download'];
        $data_download->postal_cod_download = $infoArray['postal_cod_download'];
        $data_download->contact_download = $infoArray['contact_download'];
        $data_download->mobile_download = $infoArray['mobile_download'];
        $data_download->load_orders_id = $loadOrder->id;
        $data_download->driver_data_id = 2;//isset($infoArray['data_driver']) ? $infoArray['data_driver'] : 2;
        $data_download->cmr = isset($infoArray['cmr']) ? $infoArray['cmr'] : "";
        $data_download->observations = $infoArray['observations'];
        $data_download->save();

        if (!empty($loadOrder) && !empty($client) && !empty($data_download)){
            Bills::createBill($loadOrder, $client, $data_download);
        }

        return $loadOrder;
    }

    static function arrayInfo($validateInfo){
        $infoArray = [];
        $infoArray['information_car'] = [];

        foreach ($validateInfo['infoCars'] as $key => $clientCar){
            $infoArray['information_car'][$key] = [
                'model_car'                 => isset($clientCar->model_car) ? $clientCar->model_car : '',
                'color_car'                 => isset($clientCar->color_car) ? $clientCar->color_car : '',
                'vin'                       => isset($clientCar->vin) ? $clientCar->vin : '',
                'documents'                 => isset($clientCar->documents) ? $clientCar->documents : '',
            ];
        }

        $infoArray['client'] = [
            'signing'                   => isset($validateInfo['client']['signing']) ? $validateInfo['client']['signing'] : '',
            'addresses_load'            => isset($validateInfo['client']['addresses_load']) ? $validateInfo['client']['addresses_load'] : '',
            'city_load'                 => isset($validateInfo['client']['city_load']) ? $validateInfo['client']['city_load'] : '',
            'postal_cod_load'           => isset($validateInfo['client']['postal_cod_load']) ? $validateInfo['client']['postal_cod_load'] : '',
            'phone_load'                => isset($validateInfo['client']['phone_load']) ? $validateInfo['client']['phone_load'] : '',
            'mobile_load'               => isset($validateInfo['client']['mobile_load']) ? $validateInfo['client']['mobile_load'] : '',
            'fax'                       => isset($validateInfo['client']['fax']) ? $validateInfo['client']['fax'] : '',
        ];

        $infoArray['load_order'] = [
            'id'                        => isset($validateInfo['load_order']['hash']) ? $validateInfo['load_order']['hash'] : '',
            'contact_person'            => isset($validateInfo['load_order']['contact_person']) ? $validateInfo['load_order']['contact_person'] : '',
            'bill_to'                   => isset($validateInfo['load_order']['bill_to']) ? $validateInfo['load_order']['bill_to'] : '',
            'payment_type'              => isset($validateInfo['load_order']['payment_type']) ? $validateInfo['load_order']['payment_type'] : '',
            'import_company'            => isset($validateInfo['load_order']['import_company']) ? $validateInfo['load_order']['import_company'] : '',
        ];

        $infoArray['data_download'] = [
            'contact_download'          => isset($validateInfo['data_download']['contact_download']) ? $validateInfo['data_download']['contact_download'] : '',
            'addresses_download'        => isset($validateInfo['data_download']['addresses_download']) ? $validateInfo['data_download']['addresses_download'] : '',
            'city_download'             => isset($validateInfo['data_download']['city_download']) ? $validateInfo['data_download']['city_download'] : '',
            'postal_cod_download'       => isset($validateInfo['data_download']['postal_cod_download']) ? $validateInfo['data_download']['postal_cod_download'] : '',
            'observations'              => isset($validateInfo['data_download']['observations']) ? $validateInfo['data_download']['observations'] : '',
            'mobile_download'           => isset($validateInfo['data_download']['mobile_download']) ? $validateInfo['data_download']['mobile_download'] : '',
        ];

        if (auth()->id()){
            $infoArray['data_download']['driver_data'] = isset($validateInfo['data_download']['driver_data']) ? $validateInfo['data_download']['driver_data'] : '';
            $infoArray['data_download']['cmr'] = isset($validateInfo['data_download']['cmr']) ? $validateInfo['data_download']['cmr'] : '';
        }

        return $infoArray;
    }
}
