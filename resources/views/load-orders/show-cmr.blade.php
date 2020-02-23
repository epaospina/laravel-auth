@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/cmr.css')}} ">
@endpush
@section('content')
    <div class="btn btn-bitbucket btn-print" onclick="printTable('contentCmr')">IMPRIMIR  <i class="fas fa-print"></i></div>
    <label>
        Ingrese o modifique la matricula para el camion
        <input onkeyup="$('#span-car').text($(this).val())" placeholder="Matricula del camion">
        <br>
        Ingrese o modifique una fecha de alta
        <input id="inputDate" placeholder="Modificar Fecha">
        <div class="control">
            <label class="radio">
                <input type="radio" name="type_obsevation"
                       onclick="$('#observationLabel').text('COCHES USADOS, DA&#241;ADOS Y SUCIEDAD PROPIOS DEL USO')">
                Coches Internacionales
            </label>
            <label class="radio">
                <input type="radio" name="type_obsevation"
                       onclick="$('#observationLabel').text('COCHES NUEVOS')">
                Coches Nacionales
            </label>
        </div>
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
                {{$loadOrders->bill_to}}<br>
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
                {{$loadOrders->data_load->date_load}}
                {{$loadOrders->data_load->addresses_load}}<br>
                {{$loadOrders->data_load->city_load}} // {{$loadOrders->data_load->postal_cod_load}}<br>
            </label>

            <div class="observation">
                <label class="info-text" id="observationLabel"></label>
            </div>
        </div>

        @foreach($loadOrders->customer->infoCars AS $key => $infoCar)
            <div class="info-cars">
                <label>{{$infoCar->model_car}}</label>
                <label>{{$infoCar->vin}}</label>
            </div>
        @endforeach

        <div class="info-five">
            <label>
                <span id="span-date_load">{{$loadOrders->data_load->date_load}}</span>
            </label>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{asset('js/clients.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
    <script>
        $( document ).ready(function() {
            $('#inputDate').datepicker()
            .on('change', function(e) {
                $('#span-date_load').text($(this).val())
            });
        });
    </script>
@endpush
