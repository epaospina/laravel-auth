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
}
