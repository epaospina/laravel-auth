<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Customer extends Model
{
    protected $table = 'customer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'signing', 'addresses', 'city', 'postal_cod', 'phone',
        'mobile', 'email'
    ];

    public function infoCars()
    {
        return $this
            ->hasMany('App\InformationCar');
    }

    public function loadOrders()
    {
        return $this->hasMany('App\LoadOrders');
    }

    static public function findOrCreateClient($infoArray){
        $name = Str::lower($infoArray['signing']);
        $client = Customer::query()
            ->whereRaw('lower(signing) like (?)',["%$name%"])
            ->first();

        if (isset($infoArray["car_id"])) {
            $infoCar = InformationCar::query()->find($infoArray["car_id"]);
            $client = $infoCar->customer;
        }

        if (!isset($client->id)){
            $client = new Customer();
            self::infoClient($client, $infoArray);
        }else{
            self::infoClient($client, $infoArray);
        }

        return $client;
    }

    static public function infoClient($client, $infoArray){
        $client->name = $infoArray['contact_download'];
        $client->signing = $infoArray['signing'];
        $client->addresses = $infoArray['addresses_download'];
        $client->city = $infoArray['city_download'];
        $client->province = '_';
        $client->postal_cod = $infoArray['postal_cod_download'];
        if (isset($infoArray['mobile_load'])) {
            $client->phone = $infoArray['mobile_load'];
        }
        $client->mobile = $infoArray['mobile_download'];
        $client->email = isset($infoArray['fax']) ? $infoArray['fax'] : "";
        $client->save();

        return $client;
    }

    static public function validateClient($info){
        $customer = [
            'signing'   => isset($info['client']['signing']) ? $info['client']['signing'] : '',
            'addresses' => isset($info['client']['addresses']) ? $info['client']['addresses'] : '',
            'city'      => isset($info['client']['city']) ? $info['client']['city'] : '',
            'postal_cod'=> isset($info['client']['postal_cod']) ? $info['client']['postal_cod'] : '',
            'phone'     => isset($info['client']['phone']) ? $info['client']['phone'] : '',
            'mobile'    => isset($info['client']['mobile']) ? $info['client']['mobile'] : '',
            'email'     => isset($info['client']['email']) ? $info['client']['email'] : '',
        ];

        return $customer;
    }
}
