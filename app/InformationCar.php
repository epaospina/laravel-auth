<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformationCar extends Model
{
    protected $table = 'information_car';

    public function ClientCar()
    {
        return $this->hasOne('App\ClientCar');
    }

}
