<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name', 'address', 'city', 'cod_postal', 'phone',
        'mobile', 'fax', 'created_at', 'updated_at'
    ];
}
