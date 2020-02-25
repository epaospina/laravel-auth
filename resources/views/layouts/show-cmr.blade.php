@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/cmr.css')}} ">
@endpush
@section('content')
    <div class="all-cmr">
        <div class="btn btn-bitbucket btn-print" onclick="printTable('contentCmr')">IMPRIMIR  <i class="fas fa-print"></i></div>
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Ingrese o modifique la matricula para el camion</label>
                    <input onkeyup="$('#span-car').text($(this).val())" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Matricula del camion">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Ingrese o modifique una fecha de alta</label>
                    <input onkeyup="$('#span-car').text($(this).val())" type="email" class="form-control" aria-describedby="emailHelp" id="inputDate" placeholder="Modificar Fecha">
                </div>
                <div class="form-check">
                    <input onclick="$('#observationLabel').text('COCHES USADOS, DA&#241;ADOS Y SUCIEDAD PROPIOS DEL USO')" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1">
                    <label class="form-check-label" for="exampleRadios1">
                        Coches Internacionales
                    </label>
                </div>
                <div class="form-check">
                    <input onclick="$('#observationLabel').text('COCHES NUEVOS')" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2">
                    <label class="form-check-label" for="exampleRadios2">
                        Coches Nacionales
                    </label>
                </div>
            </div>
        </div>
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

            <div class="info-cars">
                @foreach($loadOrders->customer->infoCars AS $key => $infoCar)
                    <div>
                        <span>{{$infoCar->model_car}}</span>
                        <span class="px-5">{{$infoCar->vin}}</span>
                    </div>
                @endforeach
            </div>

            <div class="info-five">
                <label>
                    <span id="span-date_load">{{$loadOrders->data_load->date_load}}</span>
                </label>
            </div>
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
