<?php

namespace App;

use App\Http\Requests\OrderRequest;
use Carbon\Carbon;
use http\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

/**
 * Class LoadOrders
 * @package App
 */
class LoadOrders extends Model
{
    /**
     * @var string
     */
    protected $table = 'load_orders';

    /**
     * @return BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    /**
     * @return HasOne
     */
    public function data_download()
    {
        return $this->hasOne('App\DataDownload');
    }

    /**
     * @return HasOne
     */
    public function data_load()
    {
        return $this->hasOne('App\DataLoad');
    }

    /**
     * @return HasOne
     */
    public function bill()
    {
        return $this->hasOne('App\Bills');
    }

    /**
     * @return HasOne
     */
    public function car()
    {
        return $this->hasOne('App\InformationCar', "load_orders_id");
    }

    /**
     * @param $hash
     * @return mixed
     */
    static function assignHash($hash){
        return LoadOrders::all()->where('hash', $hash)->first();
    }

    /**
     * @param $infoArray
     * @param $edit
     * @param null $hash
     * @return LoadOrders|false|mixed
     */
    static function createAllLoadOrder($infoArray, $edit, $hash = null){
        foreach ($infoArray['car'] as $infoCar) {
            if (!isset($infoCar['vin_original'])){
                $validator = Validator::make($infoCar, [
                    'vin' => [
                        'max:255',
                        Rule::unique('information_car')
                            ->where('status', 1)
                            ->whereNotNull("vin"),
                    ]
                ]);

                if ($validator->fails()) {
                    return $validator->validate();
                }
            }
        }

        $loadOrder = self::assignHash($hash);
        if (empty($loadOrder)){
            $loadOrder = new LoadOrders();
        }

        $dataDownload = new DataDownload();
        $dataLoad = new DataLoad();

        $client = Customer::findOrCreateClient($infoArray);

        if ($client){
            $loadOrder->customer_id = $client->id;
            $loadOrder->contact_person = isset($infoArray['contact_person']) ? $infoArray['contact_person'] : '';
            $loadOrder->date_upload = Carbon::now();
            $loadOrder->bill_to = $infoArray['bill_to'];
            $loadOrder->price = isset($infoArray['price_order']) ? $infoArray['price_order'] : 0;
            $loadOrder->constancy = isset($infoArray['constar_client']) ? $infoArray['constar_client'] : '';
            $loadOrder->payment_type_other = isset($infoArray['otrosInput']) ? $infoArray['otrosInput'] : '';
            $loadOrder->payment_type = isset($infoArray['identificacion_fiscal']) ? $infoArray['identificacion_fiscal'] : '';
            $loadOrder->import_company = isset($infoArray['identificacion_fiscal']) ? $infoArray['identificacion_fiscal'] : '';
            $loadOrder->identificacion_fiscal = isset($infoArray['identificacion_fiscal']) ? $infoArray['identificacion_fiscal'] : '';
            $loadOrder->domicilio_fiscal = isset($infoArray['domicilio_fiscal']) ? $infoArray['domicilio_fiscal'] : '';
            $loadOrder->poblacion = isset($infoArray['poblacion']) ? $infoArray['poblacion'] : '';
            $loadOrder->auto_id = isset($infoArray['auto_id']) ? $infoArray['auto_id'] : '';
            $loadOrder->pick_up = isset($infoArray['pick_up']) ? $infoArray['pick_up'] : '';
            $loadOrder->save();

            $loadOrder->hash = md5($loadOrder->id);
            $loadOrder->save();

            if (!empty($loadOrder) && !empty($loadOrder->data_download)){
                $dataLoad = $loadOrder->data_load;
            }

            if (isset($infoArray['country']) && !is_null($infoArray['country'])) {
                $dataLoad->countries_id = $infoArray['country'];
            }

            $dataLoad->addresses_load = isset($infoArray['addresses_load']) ? $infoArray['addresses_load'] : '';
            $dataLoad->city_load = isset($infoArray['city_load']) ? $infoArray['city_load'] : '';
            $dataLoad->date_load = isset($infoArray['date_load']) ? $infoArray['date_load'] : Carbon::now();
            $dataLoad->postal_cod_load = isset($infoArray['postal_cod_load']) ? $infoArray['postal_cod_load'] : '';
            $dataLoad->phone_load = isset($infoArray['phone_load']) ? $infoArray['phone_load'] : '';
            $dataLoad->mobile_load = isset($infoArray['mobile_load']) ? $infoArray['mobile_load'] : '';
            $dataLoad->load_orders_id = $loadOrder->id;
            $dataLoad->save();

            if (!empty($loadOrder) && !empty($loadOrder->data_download)){
                $dataDownload = $loadOrder->data_download;
            }

            if (isset($infoArray['country_download']) && !is_null($infoArray['country_download'])) {
                $dataDownload->countries_id = isset($infoArray['country_download']) ? $infoArray['country_download'] : '';
            }
            $dataDownload->addresses_download = isset($infoArray['addresses_download']) ? $infoArray['addresses_download'] : '';
            $dataDownload->city_download = isset($infoArray['city_download']) ? $infoArray['city_download'] : '';
            $dataDownload->signing_download = isset($infoArray['signing_download']) ? $infoArray['signing_download'] : '';
            $dataDownload->postal_cod_download = isset($infoArray['postal_cod_download']) ? $infoArray['postal_cod_download'] : '';
            $dataDownload->contact_download = isset($infoArray['contact_download']) ? $infoArray['contact_download'] : '';
            $dataDownload->mobile_download = isset($infoArray['mobile_download']) ? $infoArray['mobile_download'] : '';
            $dataDownload->load_orders_id = $loadOrder->id;
            $dataDownload->driver_data_id = DriverData::all()->first()->id;//isset($infoArray['data_driver']) ? $infoArray['data_driver'] : 2;
            $dataDownload->cmr = isset($infoArray['cmr']) ? $infoArray['cmr'] : " ";
            $dataDownload->observations = isset($infoArray['observations']) ? $infoArray['observations'] : '';
            $dataDownload->save();

            $infoArray["car_id"] = isset($infoArray["car_id"]) ? $infoArray["car_id"] : null;
            InformationCar::findOrCreateInformationCar($client, $infoArray["car"], $loadOrder, $infoArray["car_id"]);

            if (!empty($loadOrder) && !empty($dataDownload) && !empty($dataLoad) && !empty($infoArray)){
                Bills::createBill($loadOrder, $client, $dataDownload, $infoArray['payment_type'], $edit);
            }

            return $loadOrder;
        }

        return false;
    }

    /**
     * @param $validateInfo
     * @return array
     */
    static function arrayInfo($validateInfo){
        $infoArray = [];
        $infoArray['information_car'] = [];
        $infoArray['information_car'] = [
            'marca_car'      => isset($validateInfo['infoCars']['marca']) ? $validateInfo['infoCars']['marca'] : '',
            'model_car'      => isset($validateInfo['infoCars']['model_car']) ? $validateInfo['infoCars']['model_car'] : '',
            'color_car'      => isset($validateInfo['infoCars']['color_car']) ? $validateInfo['infoCars']['color_car'] : '',
            'vin'            => isset($validateInfo['infoCars']['vin']) ? $validateInfo['infoCars']['vin'] : '',
            'plate_number'   => isset($validateInfo['infoCars']['plate_number']) ? $validateInfo['infoCars']['plate_number'] : '',
            'documents'      => isset($validateInfo['infoCars']['documents']) ? $validateInfo['infoCars']['documents'] : '',
        ];

        $infoArray['client'] = Customer::validateClient($validateInfo);
        $infoArray['load_order'] = LoadOrders::validateLoadOrder($validateInfo);
        $infoArray['data_load'] = DataLoad::validateDataLoad($validateInfo);
        $infoArray['data_download'] = DataDownload::validateDataDownload($validateInfo);

        return $infoArray;
    }

    /**
     * @param $info
     * @return string[]
     */
    static public function validateLoadOrder($info){
        return [
            'id'                        => isset($info['load_order']['hash']) ? $info['load_order']['hash'] : '',
            'contact_person'            => isset($info['load_order']['contact_person']) ? $info['load_order']['contact_person'] : '',
            'bill_to'                   => isset($info['load_order']['bill_to']) ? $info['load_order']['bill_to'] : '',
            'payment_type_other'        => isset($info['load_order']['payment_other']) ? $info['load_order']['payment_other'] : '',
            'constancy'                 => isset($info['load_order']['constancy']) ? $info['load_order']['constancy'] : '',
            'import_company'            => isset($info['load_order']['import_company']) ? $info['load_order']['import_company'] : '',
            'price'                     => isset($info['load_order']['price']) ? $info['load_order']['price'] : '',
            'identificacion_fiscal'     => isset($info['load_order']['identificacion_fiscal']) ? $info['load_order']['identificacion_fiscal'] : '',
            'domicilio_fiscal'          => isset($info['load_order']['domicilio_fiscal']) ? $info['load_order']['domicilio_fiscal'] : '',
            'poblacion'                 => isset($info['load_order']['poblacion']) ? $info['load_order']['poblacion'] : '',
            'payment_type'              => isset($info['load_order']['payment_type']) ? $info['load_order']['payment_type'] : '',
            'auto_id'                   => isset($info['load_order']['auto_id']) ? $info['load_order']['auto_id'] : '',
            'pick_up'                   => isset($info['load_order']['pick_up']) ? $info['load_order']['pick_up'] : '',
        ];
    }
}
