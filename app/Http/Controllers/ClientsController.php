<?php

namespace App\Http\Controllers;

use App\Customer;
use App\LoadOrders;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ClientsController extends Controller
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
     * @return Factory|View
     */
    public function index()
    {
        $load_orders = LoadOrders::all()->where('status', true);
        $customers = Customer::all()->whereIn('id', $load_orders->pluck('customer_id'));
        return view('clients.index', compact('customers'))
            ->with('i', 0);
    }
}
