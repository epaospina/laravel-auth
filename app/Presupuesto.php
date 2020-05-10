<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $table = 'presupuesto';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo_vehiculo', 'telefono', 'modelo', 'email', 'desde', 'hasta'
    ];
}
