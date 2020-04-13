@extends('adminlte::page')

@section('title', env('TITLE_HOME', 'mcvehiculos'))

@section('content_header')
@stop
@section('content')
    <div class="container">
        <div class="home" style="text-align: center;">
            <img src="{{asset('../../images/logoMC.png')}}" alt="Mc Vehiculos">
        </div>
    </div>
@stop
