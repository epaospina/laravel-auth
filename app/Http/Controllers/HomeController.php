<?php

namespace App\Http\Controllers;

use App\Presupuesto;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('site/welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function presupuesto(Request $request)
    {
        $presupuesto = new Presupuesto();
        $presupuesto->tipo_vehiculo = $request->tipo_vehiculo;
        $presupuesto->telefono = $request->telefono;
        $presupuesto->modelo = $request->modelo;
        $presupuesto->email = $request->email;
        $presupuesto->desde = $request->desde;
        $presupuesto->hasta = $request->hasta;
        $presupuesto->save();
        return redirect('presupuesto-transporte-vehiculo');
    }

    public function guardarPresupuesto(){
        return view('site/save_presupuesto');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function admin()
    {
        return view('home');
    }
}
