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
}
