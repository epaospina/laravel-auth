<?php

namespace App\Http\Controllers;

use App\Customer;
use App\LoadOrders;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('clients.index', compact('customers'))
            ->with('i', 0);
    }
}
