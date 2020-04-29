<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    protected $table = 'countries';

    public function data_download()
    {
        return $this->belongsTo('App\DataDownload');
    }
}
