<?php

namespace App;

use app\Customer;
use Carbon\Carbon;
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


    static function createBill(LoadOrders $loadOrder, Customer $client, DataDownload $dataDownload){
        $date = Carbon::parse($loadOrder->date_upload)->format('d/m/Y');

        $bill = new Bills();
        $bill->num_bill = rand(100,1000);
        $bill->name_client = $client->signing;
        $bill->address_client = $client->addresses_load;
        $bill->department_client = $client->city_load;
        $bill->city_client = $client->city_load;
        $bill->postal_cod_client = $client->postal_cod_load;
        $bill->load_orders_id = $loadOrder->id;
        $bill->description = $date.': '.$client->city_load.'//'.$dataDownload->city_download;
        $bill->unit_price = Services::all()->first()->precio;
        $bill->price = ($bill->unit_price*($client->infoCars->count()));
        $bill->iva = 0.21*$bill->price;
        $bill->observations = "ninguna";
        $bill->save();
    }
}
