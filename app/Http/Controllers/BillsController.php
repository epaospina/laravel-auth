<?php

namespace App\Http\Controllers;

use App\Bills;
use App\Customer;
use App\LoadOrders;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BillsController extends Controller
{

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
        return view('bills.show-bill-load-order', compact('bill', 'loadOrder'));
    }
}
