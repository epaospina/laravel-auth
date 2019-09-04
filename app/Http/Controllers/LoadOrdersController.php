<?php

namespace App\Http\Controllers;

use App\Clients;
use App\LoadOrders;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoadOrdersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

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
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $load_order = LoadOrders::createAllLoadOrder($request->all(), '');

        return redirect()->action(
            'LoadOrdersController@show', $load_order);
    }

    /**
     * Display the specified resource.informationCar
     *
     * @param  LoadOrders  $loadOrder
     * @return Response
     */
    public function show($loadOrder)
    {
        $loadOrder = LoadOrders::all()->find(decrypt($loadOrder));
        $infoArray = LoadOrders::arrayInfo([
            'information_car' => $loadOrder->clientCar->informationCar->toArray(),
            'client' => $loadOrder->clientCar->client->toArray(),
            'load_order' => $loadOrder->toArray(),
            'data_download' => $loadOrder->dataDownload->toArray(),
        ]);

        return view('load-orders.show', compact('infoArray'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  LoadOrders $loadOrder
     * @return Response
     */
    public function edit($loadOrder)
    {
        $loadOrder = LoadOrders::all()->find(decrypt($loadOrder));
        $infoArray = LoadOrders::arrayInfo([
            'information_car' => $loadOrder->clientCar->informationCar->toArray(),
            'client' => $loadOrder->clientCar->client->toArray(),
            'load_order' => $loadOrder->toArray(),
            'data_download' => $loadOrder->dataDownload->toArray(),
        ]);


        return view('load-orders.edit', compact('infoArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  LoadOrders $loadOrder
     * @return Response
     */
    public function update(Request $request, LoadOrders $loadOrder)
    {
        LoadOrders::createAllLoadOrder($request->all(), $loadOrder);
        return \response('ok', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clients  $client
     * @return Response
     */
    public function destroy(Clients $client)
    {
        //
    }
}
