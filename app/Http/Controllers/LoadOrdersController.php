<?php

namespace App\Http\Controllers;

use App\Bills;
use App\CarsPending;
use App\Customer;
use App\InformationCar;
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
        $this->middleware('auth')->only('index', 'cmr', 'pending');
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
        $loadOrder = LoadOrders::createAllLoadOrder($request->all());

        if ($loadOrder){
            return redirect()->action(
                'LoadOrdersController@show', $loadOrder->hash);
        }

        return redirect()
            ->back()
            ->withInput()
            ->withErrors(['msg', 'Lo sentimos ocurrio un error al caragar los datos, intenta de nuevo']);
    }

    /**
     * Display the specified resource.informationCar
     *
     * @param  $loadOrder
     * @return Response
     */
    public function show($hash)
    {
        $loadOrder = LoadOrders::assignHash($hash);

        $infoArray = LoadOrders::arrayInfo([
            'infoCars' => $loadOrder->customer->infoCars,
            'client' => $loadOrder->customer->toArray(),
            'load_order' => $loadOrder->toArray(),
            'data_download' => $loadOrder->data_download->toArray(),
        ]);

        return view('load-orders.show', compact('infoArray'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  LoadOrders $loadOrder
     * @return Response
     */
    public function edit($hash)
    {
        $loadOrder = LoadOrders::assignHash($hash);

        $infoArray = LoadOrders::arrayInfo([
            'infoCars' => $loadOrder->customer->infoCars,
            'client' => $loadOrder->customer->toArray(),
            'load_order' => $loadOrder->toArray(),
            'data_download' => $loadOrder->data_download->toArray(),
        ]);

        return view('load-orders.edit', compact('infoArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  $loadOrder
     * @return Response
     */
    public function update(Request $request, $loadOrder)
    {
        LoadOrders::createAllLoadOrder($request->all(), $loadOrder);
        //Bills::createBill(LoadOrders::createAllLoadOrder($request->all(), $loadOrder));

        return \response('ok', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LoadOrders $loadOrders
     * @return Response
     */
    public function cmr(LoadOrders $loadOrders)
    {
        return view('load-orders.show-cmr', compact('loadOrders'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CarsPending $carsPending
     * @return Response
     */
    public function pending(CarsPending $carsPending)
    {
        return view('load-orders.pending', compact('carsPending'));
    }

    public function pendingCars(Request $request)
    {
        $carsPending = new CarsPending();
        $carsPending->array_cars = $request->cars;
        $carsPending->user_id = auth()->id();
        $carsPending->save();

        return route('load-orders.pending-cars', $carsPending->id);
    }

    public function pendingApiCars(CarsPending $carsPending)
    {
        $loadOrders = LoadOrders::all();
        $cars = [];
        foreach ($loadOrders as $keyLoad => $loadOrder){
            foreach ($loadOrder->customer->infoCars as $key => $infoCar) {
                if (in_array($infoCar->id, explode(',',$carsPending->array_cars))){
                    $cars[$keyLoad]['client']             = $loadOrder->customer->signing;
                    $cars[$keyLoad]['buyer']              = $loadOrder->bill_to;
                    $cars[$keyLoad]['action_do']          = 'DESCARGAR';
                    $cars[$keyLoad]['car'][$key]          = $infoCar->model_car;
                    $cars[$keyLoad]['addresses_load']     = $loadOrder->customer->addresses_load;
                    $cars[$keyLoad]['scheduler']          = '';
                    $cars[$keyLoad]['addresses_download'] = $loadOrder->data_download->addresses_download;
                    $cars[$keyLoad]['contact']            = $loadOrder->data_download->contact_download;
                    $cars[$keyLoad]['observation']        = $loadOrder->bill->price;
                }
            }
        }

        return $cars;
    }
}
