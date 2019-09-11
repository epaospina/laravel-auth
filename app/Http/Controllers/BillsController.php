<?php

namespace App\Http\Controllers;

use App\Bills;
use App\Customer;
use App\LoadOrders;
use App\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BillsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $bills = Bills::all();
        return view('bills.index', compact('bills'))
            ->with('i', 0);
    }
    /**
     * Display a listing of the resource.
     **
     * @param  LoadOrders $loadOrder
     * @return Response
     */
    public function showBillLoadOrder(LoadOrders $loadOrder)
    {
        $bill = $loadOrder->bill;
        $service = Services::all()->find(1);
        return view('bills.show', compact('bill', 'loadOrder', 'service'))
            ->with('date', Carbon::now()->format('d/m/Y'));
    }
}
