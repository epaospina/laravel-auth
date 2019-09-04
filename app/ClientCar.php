<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientCar extends Model
{
    protected $table = 'client_car';

    public function informationCar()
    {
        return $this->belongsTo('App\InformationCar');
    }

    public function client()
    {
        return $this->belongsTo('App\Clients');
    }

    public function loadOrder(){
        return $this->hasOne('App\LoadOrders');
    }
}
