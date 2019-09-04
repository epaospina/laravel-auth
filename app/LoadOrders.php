<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class LoadOrders extends Model
{
    protected $table = 'load_orders';

    public function clientCar()
    {
        return $this->belongsTo('App\ClientCar');
    }

    public function dataDownload()
    {
        return $this->hasOne('App\DataDownload');
    }

    static function createAllLoadOrder($infoArray, $loadOrder){
        $information_car = new InformationCar();
        $client = new Clients();
        $client_car = new ClientCar();
        $data_download = new DataDownload();

        if (isset($loadOrder) && isset($loadOrder->clientCar)){
            if (isset($loadOrder->clientCar->informationCar)){
                $information_car = $loadOrder->clientCar->informationCar;
            }
        }

        $information_car->model_car = $infoArray['model_car'];
        $information_car->color_car = $infoArray['color_car'];
        $information_car->vin = $infoArray['vin'];
        $information_car->documents = $infoArray['documents'];
        $information_car->save();

        if (isset($loadOrder) && isset($loadOrder->clientCar)){
            if (isset($loadOrder->clientCar->informationCar)){
                $client = $loadOrder->clientCar->client;
            }
        }

        $client->signing = $infoArray['signing'];
        $client->addresses_load = $infoArray['addresses_load'];
        $client->city_load = $infoArray['city_load'];
        $client->postal_cod_load = $infoArray['postal_cod_load'];
        $client->phone_load = $infoArray['phone_load'];
        $client->mobile_load = $infoArray['mobile_load'];
        $client->fax = $infoArray['fax'];
        $client->save();

        if ($information_car && $client){
            if (isset($loadOrder) && isset($loadOrder->clientCar)){
                $client_car = $loadOrder->clientCar;
            }

            $client_car->client_id = $client->id;
            $client_car->information_car_id = $information_car->id;
            $client_car->save();
        }

        if (empty($loadOrder)){
            $loadOrder = new LoadOrders();
        }

        $loadOrder->client_car_id = $client_car->id;
        $loadOrder->contact_person = $infoArray['contact_person'];
        $loadOrder->date_upload = Carbon::now();
        $loadOrder->bill_to = $infoArray['bill_to'];
        $loadOrder->import_company = $infoArray['import_company'];
        $loadOrder->save();

        if (!empty($loadOrder) && !empty($loadOrder->dataDownload)){
            $data_download = $loadOrder->dataDownload;
        }

        $data_download->addresses_download = $infoArray['addresses_download'];
        $data_download->city_download = $infoArray['city_download'];
        $data_download->postal_cod_download = $infoArray['postal_cod_download'];
        $data_download->contact_download = $infoArray['contact_download'];
        $data_download->mobile_download = $infoArray['mobile_download'];
        $data_download->load_orders_id = $loadOrder->id;
        $data_download->driver_data_id = isset($infoArray['data_driver']) ? $infoArray['data_driver'] : 2;
        $data_download->cmr = isset($infoArray['cmr']) ? $infoArray['cmr'] : "";
        $data_download->observations = $infoArray['observations'];
        $data_download->save();

        return $loadOrder;
    }

    static function arrayInfo($validateInfo){
        $infoArray = [];

        $infoArray['information_car'] = [
            'model_car'                 => isset($validateInfo['information_car']['model_car']) ? $validateInfo['information_car']['model_car'] : '',
            'color_car'                 => isset($validateInfo['information_car']['color_car']) ? $validateInfo['information_car']['color_car'] : '',
            'vin'                       => isset($validateInfo['information_car']['vin']) ? $validateInfo['information_car']['vin'] : '',
            'documents'                 => isset($validateInfo['information_car']['documents']) ? $validateInfo['information_car']['documents'] : '',
        ];

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
            'id'                        => isset($validateInfo['load_order']['id']) ? $validateInfo['load_order']['id'] : '',
            'contact_person'            => isset($validateInfo['load_order']['contact_person']) ? $validateInfo['load_order']['contact_person'] : '',
            'bill_to'                   => isset($validateInfo['load_order']['bill_to']) ? $validateInfo['load_order']['bill_to'] : '',
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
