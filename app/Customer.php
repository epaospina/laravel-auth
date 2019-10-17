<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'signing', 'addresses_load', 'city_load', 'postal_cod_load',
        'phone_load', 'mobile_load', 'fax'
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
        $client = Customer::all()->where('signing', $infoArray['signing'])
            ->where('addresses_load', $infoArray['addresses_load'])
            ->where('city_load', $infoArray['city_load'])->first();

        if (!isset($client->id)){
            $client = new Customer();
        }

        self::infoClient($client, $infoArray);

        return $client;
    }

    static public function infoClient($client, $infoArray){
        $client->signing = $infoArray['signing'];
        $client->addresses_load = $infoArray['addresses_load'];
        $client->city_load = $infoArray['city_load'];
        $client->postal_cod_load = $infoArray['postal_cod_load'];
        $client->phone_load = $infoArray['phone_load'];
        $client->mobile_load = $infoArray['mobile_load'];
        $client->fax = $infoArray['fax'];
        $client->save();

        return $client;
    }
}
