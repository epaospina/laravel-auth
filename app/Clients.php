<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $table = 'clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'signing', 'addresses_load', 'city_load', 'postal_cod_load',
        'phone_load', 'mobile_load', 'fax'
    ];

    public function clientCar()
    {
        return $this->hasMany('App\ClientCar');
    }

    public function loadOrders()
    {
        return $this->belongsTo('App\ClientCar');
    }
}
