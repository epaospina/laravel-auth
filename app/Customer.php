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
        $client = Customer::all()->where('signing', $infoArray['signing'])->first();

        if (!isset($client->id)){
            $client = new Customer();
            self::infoClient($client, $infoArray);
        }

        return $client;
    }

    static public function infoClient($client, $infoArray){
        $client->signing = $infoArray['signing'];
        $client->addresses = $infoArray['addresses_client'];
        $client->city = $infoArray['city_client'];
        $client->postal_cod = $infoArray['postal_cod_client'];
        $client->phone = $infoArray['phone_load'];
        $client->mobile = $infoArray['mobile_load'];
        $client->email = $infoArray['fax'];
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
