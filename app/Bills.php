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


    static function createBill(LoadOrders $loadOrder, Customer $client, DataDownload $dataDownload, $payment_type,$edit){
        $date = Carbon::parse($loadOrder->date_upload)->format('d/m/Y');

        if ($edit){
            $bill = Bills::query()->where('load_orders_id', $loadOrder->id)->first();
        }else{
            $bill = new Bills();
        }
        $bill->num_bill = rand(100,1000);
        $bill->name_client = $loadOrder->bill_to;
        $bill->address_client = $client->addresses;
        $bill->department_client = $client->province;
        $bill->city_client = $client->city;
        $bill->postal_cod_client = $client->postal_cod;
        $bill->load_orders_id = $loadOrder->id;
        $bill->description = $date.': '.$loadOrder->data_load->city_load.'//'.$dataDownload->city_download;
        $bill->unit_price = $loadOrder->price;
        $bill->price = ($bill->unit_price*($client->infoCars->count()));
        $bill->iva = 0.21*$bill->price;
        $bill->payment_type = !is_null($payment_type) ? $payment_type : '';

        if ($payment_type === 'Transferencia Bancaria'){
            $bill->observations = 'Numero de cuenta ES34 3190 2073 1644 0287 5522   ';
        }else{
            $bill->observations = "ninguna";
        }

        $bill->save();
    }
}
