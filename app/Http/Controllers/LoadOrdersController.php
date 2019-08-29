<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientCar;
use App\DataDownload;
use App\InformationCar;
use App\LoadOrders;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoadOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $load_orders = LoadOrders::all();
        return view('load-orders.index', compact('load_orders'))
            ->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('load-orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $information_car = new InformationCar();
        $information_car->model_car = $request->get('model_car');
        $information_car->color = $request->get('color_car');
        $information_car->vin = $request->get('chassis');
        $information_car->documents = $request->get('documents_car');
        $information_car->save();

        $client = new Client();
        $client->name = $request->get('signing');
        $client->address = $request->get('addresses_load');
        $client->city = $request->get('city_load');
        $client->cod_postal = $request->get('postal_cod_load');
        $client->phone = $request->get('phone_load');
        $client->mobile = $request->get('mobile_load');
        $client->fax = $request->get('fax');
        $client->save();

        if ($information_car && $client){
            $client_car = new ClientCar();
            $client_car->client_id = $client->id;
            $client_car->information_car_id = $information_car->id;
            $client_car->save();
        }

        $carbon = new Carbon();
        $load_order = new LoadOrders();
        $load_order->client_car_id = $client_car->id;
        $load_order->contact_person = $request->get('person_contact');
        $load_order->date_upload = $carbon->now();
        $load_order->buyer = $request->get('bill_to');
        $load_order->importing_company = $request->get('import_company');
        $load_order->save();

        $data_download = new DataDownload();
        $data_download->info_download = $request->get('info_download');
        $data_download->contact_person = $request->get('person_contact_download');
        $data_download->mobil = $request->get('mobile_download');
        $data_download->load_orders_id = $load_order->id;
        $data_download->driver_data_id = 2;
        $data_download->cmr = $request->get('cmr');
        $data_download->observations = $request->get('observations');
        $data_download->save();

        return redirect()->action(
            'LoadOrdersController@show', $load_order);
    }

    /**
     * Display the specified resource.
     *
     * @param  LoadOrders  $loadOrder
     * @return Response
     */
    public function show(LoadOrders $loadOrder)
    {
        $infoCar = $loadOrder->clientCar->informationCar;
        $infoClient = $loadOrder->clientCar->client;
        $infoDownload = $loadOrder->dataDownload;

        $infoArray = [
            'modelColor'        => $infoCar->model_car.' / '. $infoCar->color,
            'vin'               => $infoCar->vin,
            'name'              => $infoClient->name,
            'address'           => $infoClient->address.','.$infoClient->city.','.$infoClient->cod_postal,
            'phone'             => $infoClient->phone,
            'mobile'            => $infoClient->mobile,
            'fax'               => $infoClient->fax,
            'contact_person'    => $loadOrder->contact_person,
            'documents'         => $infoCar->documents,
            'buyer'             => $loadOrder->buyer,
            'importing_company' => $loadOrder->importing_company,
            'info_download'     => $infoDownload->info_download,
            'contact_download'  => $infoDownload->contact_person,
            'driver_data'       => $infoDownload->driver_data,
            'cmr'               => $infoDownload->cmr,
            'observations'      => $infoDownload->observations,
            'mobile_download'   => $infoDownload->mobil,
        ];

        return view('load-orders.show', compact('infoArray'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
