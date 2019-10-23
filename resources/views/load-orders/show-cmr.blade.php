@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/cmr.css')}} ">
@endpush
@section('content')
    <div class="btn btn-bitbucket btn-print" onclick="printTable('contentCmr')">IMPRIMIR  <i class="fas fa-print"></i></div>
    <label>
        Ingrese la matricula para el camion
        <input onkeyup="$('#span-car').text($(this).val())" placeholder="Matricula del camion">
    </label>
    <div class="container-cmr" id="contentCmr">
        <div class="info-one">
            <label>
                {{$loadOrders->customer->signing}}<br>
                {{$loadOrders->data_load->addresses_load}}<br>
                {{$loadOrders->data_load->city_load}} // {{$loadOrders->data_load->postal_cod_load}}<br>
            </label>
        </div>

        <div class="info-two">
            <label>
                {{$loadOrders->data_download->contact_download}}<br>
                {{$loadOrders->data_download->addresses_download}}<br>
                {{$loadOrders->data_download->city_download}} {{$loadOrders->data_download->postal_cod_download}}
            </label>

            <div class="matricula-camion">
                <span id="span-car">Matricula</span>
            </div>
        </div>

        <div class="info-three">
            <label>
                {{$loadOrders->data_download->addresses_download}}<br>
                {{$loadOrders->data_download->city_download}} {{$loadOrders->data_download->postal_cod_download}}
            </label>
        </div>

        <div class="info-four">
            <label>
                {{$loadOrders->date_upload}}
                {{$loadOrders->data_load->addresses_load}}<br>
                {{$loadOrders->data_load->city_load}} // {{$loadOrders->customer->postal_cod_load}}<br>
            </label>

            <div class="observation">
                <label class="info-text">{{$loadOrders->data_download->observations}}</label>
            </div>
        </div>

        @foreach($loadOrders->customer->infoCars AS $key => $infoCar)
            <div class="info-cars">
                <label>{{$infoCar->model_car}}</label>
                <label>{{$infoCar->vin}}</label>
            </div>
        @endforeach
    </div>
@endsection
@push('js')
    <script src="{{asset('js/clients.js')}}"></script>
@endpush
