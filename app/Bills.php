<?php

namespace App;

use app\Customer;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $table = 'bills';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'num_bill', 'name_client', 'address_client', 'city_client',
        'postal_cod_client', 'unit_price', 'price', 'subtotal', 'iva',
        'observations', 'total'
    ];


    static function createBill(LoadOrders $loadOrder){
        $client = $loadOrder->customer;
        $bill = new Bills();
        $bill->num_bill = rand(100,1000);
        $bill->name_client = $client->signing;
        $bill->address_client = $client->addresses_load;
        $bill->city_client = $client->city_load;
        $bill->postal_cod_client = $client->postal_cod_load;
        $bill->unit_price = Services::all()->first()->precio;
        $bill->price = ($bill->unit_price*($client->infoCars->count()));
        $bill->iva = 0.21*$bill->price;
        $bill->observations = "ninguna";
        $bill->save();

        $billsCustomer = new BillsLoadOrders();
        $billsCustomer->bills_id = $bill->id;
        $billsCustomer->load_orders_id = $loadOrder->id;
        $billsCustomer->save();
    }
}
