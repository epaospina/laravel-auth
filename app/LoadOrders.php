<?php

namespace App;

use Carbon\Carbon;
use http\Client;
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

    public function data_load()
    {
        return $this->hasOne('App\DataLoad');
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

        $dataDownload = new DataDownload();
        $dataLoad = new DataLoad();

        $infoCars = InformationCar::findOrCreateInformationCar($infoArray, $infoArray["car"]);

        if ($infoCars){
            $loadOrder->customer_id = $infoCars->customer->id;
            $loadOrder->contact_person = $infoArray['contact_person'];
            $loadOrder->date_upload = Carbon::now();
            $loadOrder->bill_to = $infoArray['bill_to'];
            $loadOrder->price = $infoArray['price_order'];
            $loadOrder->constancy = isset($infoArray['constar_client']) ? $infoArray['constar_client'] : '.';
            $loadOrder->payment_type_other = isset($infoArray['otrosInput']) ? $infoArray['otrosInput'] : '.';
            $loadOrder->import_company = $infoArray['import_company'];
            $loadOrder->save();

            $loadOrder->hash = md5($loadOrder->id);
            $loadOrder->save();

            if (!empty($loadOrder) && !empty($loadOrder->data_download)){
                $dataLoad = $loadOrder->data_load;
            }

            $dataLoad->countries_id = $infoArray['country'];
            $dataLoad->addresses_load = $infoArray['addresses_load'];
            $dataLoad->city_load = $infoArray['city_load'];
            $dataLoad->date_load = $infoArray['date_load'];
            $dataLoad->postal_cod_load = $infoArray['postal_cod_load'];
            $dataLoad->phone_load = $infoArray['phone_load'];
            $dataLoad->mobile_load = $infoArray['mobile_load'];
            $dataLoad->load_orders_id = $loadOrder->id;
            $dataLoad->save();

            if (!empty($loadOrder) && !empty($loadOrder->data_download)){
                $dataDownload = $loadOrder->data_download;
            }

            $dataDownload->countries_id = $infoArray['country_download'];
            $dataDownload->addresses_download = $infoArray['addresses_download'];
            $dataDownload->city_download = $infoArray['city_download'];
            $dataDownload->postal_cod_download = $infoArray['postal_cod_download'];
            $dataDownload->contact_download = $infoArray['contact_download'];
            $dataDownload->mobile_download = $infoArray['mobile_download'];
            $dataDownload->load_orders_id = $loadOrder->id;
            $dataDownload->driver_data_id = DriverData::all()->first()->id;//isset($infoArray['data_driver']) ? $infoArray['data_driver'] : 2;
            $dataDownload->cmr = isset($infoArray['cmr']) ? $infoArray['cmr'] : " ";
            $dataDownload->observations = $infoArray['observations'];
            $dataDownload->save();

            if (!empty($loadOrder) && !empty($infoCars->customer) && !empty($dataDownload) && !empty($dataLoad) && isset($infoArray['payment_type'])){
                Bills::createBill($loadOrder, $infoCars->customer, $dataDownload, $infoArray['payment_type']);
            }

            return $loadOrder;
        }

        return false;
    }

    static function arrayInfo($validateInfo){
        $infoArray = [];
        $infoArray['information_car'] = [];

        if (isset($validateInfo['infoCars']['id'])){
            $infoArray['information_car'] = [
                'model_car'      => isset($validateInfo['infoCars']['model_car']) ? $validateInfo['infoCars']['model_car'] : '',
                'color_car'      => isset($validateInfo['infoCars']['color_car']) ? $validateInfo['infoCars']['color_car'] : '',
                'vin'            => isset($validateInfo['infoCars']['vin']) ? $validateInfo['infoCars']['vin'] : '',
                'documents'      => isset($validateInfo['infoCars']['documents']) ? $validateInfo['infoCars']['documents'] : '',
            ];
        }else{
            foreach ($validateInfo['infoCars'] as $key => $clientCar){
                $infoArray['information_car'][$key] = [
                    'model_car'  => isset($clientCar->model_car) ? $clientCar->model_car : '',
                    'color_car'  => isset($clientCar->color_car) ? $clientCar->color_car : '',
                    'vin'        => isset($clientCar->vin) ? $clientCar->vin : '',
                    'documents'  => isset($clientCar->documents) ? $clientCar->documents : '',
                ];
            }
        }

        $infoArray['client'] = Customer::validateClient($validateInfo);
        $infoArray['load_order'] = LoadOrders::validateLoadOrder($validateInfo);
        $infoArray['data_load'] = DataLoad::validateDataLoad($validateInfo);
        $infoArray['data_download'] = DataDownload::validateDataDownload($validateInfo);

        return $infoArray;
    }

    static public function validateLoadOrder($info){
        return [
            'id'               => isset($info['load_order']['hash']) ? $info['load_order']['hash'] : '',
            'contact_person'   => isset($info['load_order']['contact_person']) ? $info['load_order']['contact_person'] : '',
            'bill_to'          => isset($info['load_order']['bill_to']) ? $info['load_order']['bill_to'] : '',
            'payment_type_other'   => isset($info['load_order']['payment_other']) ? $info['load_order']['payment_other'] : '',
            'constancy'          => isset($info['load_order']['constancy']) ? $info['load_order']['constancy'] : '',
            'payment_type'     => isset($info['load_order']['payment_type']) ? $info['load_order']['payment_type'] : '',
            'import_company'   => isset($info['load_order']['import_company']) ? $info['load_order']['import_company'] : '',
            'price'            => isset($info['load_order']['price']) ? $info['load_order']['price'] : '',
        ];
    }
}
