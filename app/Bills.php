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


    static function createBill(LoadOrders $loadOrder, Customer $client, DataDownload $dataDownload, $payment_type){
        $date = Carbon::parse($loadOrder->date_upload)->format('d/m/Y');

        $bill = new Bills();
        $bill->num_bill = rand(100,1000);
        $bill->name_client = $dataDownload->contact_download;
        $bill->address_client = $dataDownload->addresses_download;
        $bill->department_client = $dataDownload->city_download;
        $bill->city_client = $dataDownload->city_download;
        $bill->postal_cod_client = $dataDownload->postal_cod_download;
        $bill->load_orders_id = $loadOrder->id;
        $bill->description = $date.': '.$client->city_load.'//'.$dataDownload->city_download;
        $bill->unit_price = Services::all()->first()->precio;
        $bill->price = ($bill->unit_price*($client->infoCars->count()));
        $bill->iva = 0.21*$bill->price;
        $bill->payment_type = $payment_type;
        if ($payment_type === 'Transferencia Bancaria'){
            $bill->observations = 'Numero de cuenta ES34 3190 2073 1644 0287 5522   ';
        }else{
            $bill->observations = "ninguna";
        }
        $bill->save();
    }
}
