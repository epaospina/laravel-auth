<?php

namespace App;

use app\Customer;
use Illuminate\Database\Eloquent\Model;

class BillsLoadOrders extends Model
{
    protected $table = 'bills_load_orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bills_id', 'client_id'
    ];
}
