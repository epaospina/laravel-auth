<?php

namespace App\Http\Controllers;

use App\CarsPending;
use App\Countries;
use App\Customer;
use App\InformationCar;
use App\LoadOrders;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

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
     * @return Factory|View
     */
    public function index()
    {
        return view('load-orders.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return LoadOrders[]|Collection
     */
    public function listOrders()
    {
        $loadOrders = LoadOrders::all()->where('status', true);
        foreach ($loadOrders as $loadOrder){
            $loadOrder->customer;
            $loadOrder->customer->infoCars->where('status', true);
        }
        return $loadOrders;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $country
     * @return LoadOrders[]|Collection
     */
    public function filterCountry($country)
    {
        $loadOrders = LoadOrders::all()
            ->where('countries_id', $country)
            ->where('status', true);
        foreach ($loadOrders as $loadOrder){
            $loadOrder->customer;
            $loadOrder->customer->infoCars->where('status', true);
        }
        return $loadOrders;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $country
     * @return Factory|View
     */
    public function listByCountry($country)
    {
        return view('load-orders.order-country');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Support\Collection
     */
    public function consultCarsPending()
    {
        return DB::table('information_car as car')
            ->select('car.id as card_id', 'car.model_car', 'car.vin',
                'customer.signing', 'customer.city', 'customer.phone')
            ->join('customer', 'customer.id', '=', 'customer_id')
            ->where('status', true)
            ->where('is_pending', '=', true)
            ->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function carsPending()
    {
        $load_orders = LoadOrders::all()->where('status', true);
        return view('load-orders.cars-pending', compact('load_orders'))
            ->with('i', 0);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function carsOldLoad()
    {
        return view('load-orders.cars-old-load');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Support\Collection
     */
    public function consultCarsOldLoad()
    {
        return DB::table('information_car as car')
            ->select('car.id as card_id', 'car.model_car', 'car.vin',
                'customer.signing', 'customer.city', 'customer.phone', 'load_orders.hash')
            ->join('customer', 'customer.id', '=', 'car.customer_id')
            ->join('load_orders', 'customer.id', '=', 'load_orders.customer_id')
            ->where('is_pending', '=', false)
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $countries = Countries::all()->pluck('country', 'id');
        return view('load-orders.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $loadOrder = LoadOrders::createAllLoadOrder($request->all());

        if ($loadOrder){
            return redirect()->action('LoadOrdersController@carsPending');
        }

        return redirect()
            ->back()
            ->withInput()
            ->withErrors(['Lo sentimos ocurrio un error al caragar los datos, porfavor intenta de nuevo']);
    }

    /**
     * Display the specified resource.informationCar
     *
     * @param $hash
     * @param $car
     * @return Factory|View
     */
    public function show($hash, $car)
    {
        $loadOrder = LoadOrders::assignHash($hash);
        $infoArray = LoadOrders::arrayInfo([
            'infoCars' => $loadOrder->customer
                ->infoCars
                ->where('status', '=', 1)
                ->where('id', '=', $car)
                ->first()
                ->toArray(),
            'client' => $loadOrder->customer->toArray(),
            'load_order' => $loadOrder->toArray(),
            'data_download' => $loadOrder->data_download->toArray(),
            'data_load' => $loadOrder->data_load->toArray(),
        ]);

        return view('load-orders.show', compact('infoArray'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $hash
     * @param $car
     * @return Factory|View
     */
    public function edit($hash, $car)
    {
        $loadOrder = LoadOrders::assignHash($hash);
        $infoArray = LoadOrders::arrayInfo([
            'infoCars' => $loadOrder->customer
                ->infoCars
                ->where('status', 1)
                ->where('id', $car)
                ->first()
                ->toArray(),
            'client' => $loadOrder->customer->toArray(),
            'load_order' => $loadOrder->toArray(),
            'data_download' => $loadOrder->data_download->toArray(),
            'data_load' => $loadOrder->data_load->toArray(),
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

        return \response('ok', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LoadOrders $loadOrders
     * @return Factory|View
     */
    public function cmr(LoadOrders $loadOrders)
    {
        return view('load-orders.show-cmr', compact('loadOrders'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CarsPending $carsPending
     * @return Factory|View
     */
    public function pending(CarsPending $carsPending)
    {
        return view('load-orders.pending', compact('carsPending'));
    }

    public function pendingCars(Request $request)
    {
        $carsId = '';
        foreach ($request->cars as $car){
            if ($carsId === ''){
                $carsId = $car['card_id'];
            }else{
                $carsId = $carsId.','.$car['card_id'];
            }
            $infocar = InformationCar::query()->find($car['card_id']);
            $infocar->is_pending = false;
            $infocar->save();
        }
        $carsPending = new CarsPending();
        $carsPending->array_cars = $carsId;
        $carsPending->user_id = auth()->id();
        $carsPending->save();

        return route('load-orders.pending-cars', $carsPending->id);
    }

    public function pendingApiCars(CarsPending $carsPending)
    {
        $loadOrders = LoadOrders::all()->where('status', 1);
        $cars = [];
        foreach ($loadOrders as $keyLoad => $loadOrder){
            foreach ($loadOrder->customer->infoCars->where('status', 1) as $key => $infoCar) {
                if (in_array($infoCar->id, explode(',',$carsPending->array_cars))){
                    $cars[$keyLoad]['client']             = $loadOrder->customer->signing;
                    $cars[$keyLoad]['buyer']              = isset($loadOrder->constancy) ? $loadOrder->constancy : $loadOrder->bill_to;
                    $cars[$keyLoad]['action_do']          = 'DESCARGAR';
                    $cars[$keyLoad]['car'][$key]          = $infoCar->model_car ."<br>". $infoCar->vin;
                    $cars[$keyLoad]['addresses_load']     = $loadOrder->customer->addresses_load;
                    $cars[$keyLoad]['scheduler']          = '';
                    $cars[$keyLoad]['addresses_download'] = $loadOrder->data_download->addresses_download;
                    $cars[$keyLoad]['contact']            = $loadOrder->data_download->contact_download."<br>".$loadOrder->data_download->mobile_download;
                    $cars[$keyLoad]['observation']        = $loadOrder->bill->price;
                }
            }
        }

        return $cars;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $hash
     * @return JsonResponse
     */
    public function destroy($hash)
    {
        $loadOrder = LoadOrders::assignHash($hash);
        $loadOrder->status = 0;
        foreach ($loadOrder->customer->infoCars as $infoCars){
            $infoCars->status = 0;
            $infoCars->save();
        }

        $loadOrder->save();
        return \response()->json('ok');
    }

    public function filter($filter){
        if (strlen($filter) >= 3){
            return DB::table('customer')
                ->where('signing', 'LIKE', '%'.$filter.'%')
                ->get();
        }
        return '';
    }

    public function getFilter($filter){
        return Customer::all()->find($filter);
    }

    public function listCountry(){
        return DB::table('customer')->pluck('city')->toArray();
    }
}
