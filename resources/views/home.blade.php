@extends('adminlte::page')

@section('title', env('TITLE_HOME', 'mcvehiculos'))

@section('content_header')
@stop
@section('content')
    <div class="container">
        <div class="home" style="text-align: center;">
            <h1 class="title-home">Bienvenido {{auth()->user()->email}}</h1>
            <img src="{{asset('../../images/logomcTrans.png')}}" alt="Mc Vehiculos">
        </div>
    </div>
@stop
