@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/cmr.css')}} ">
@endpush
@section('content')

    <div class="action-div">
        <div class="btn-group" role="group" aria-label="Basic example">
            <div class="btn btn-primary" onclick="printTable('contentCmr')">IMPRIMIR</div>
            <div class="btn btn-secondary" onclick="exportPDF('contentCmr')">PDF</div>
            <div class="btn btn-secondary" onclick="downWord('contentCmr')">WORD</div>
        </div>
    </div>
    <div class="card m-3">
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

            <div class="matricula-camion text-break">
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
                    <label>{{$infoCar->model_car}}</label>
                    <label>{{$infoCar->vin}}</label>
                </div>
            @endforeach
        </div>

        <div class="info-five">
            <label>
                <span id="span-date_load">{{$loadOrders->data_load->date_load}}</span>
            </label>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js" integrity="sha256-c3RzsUWg+y2XljunEQS0LqWdQ04X1D3j22fd/8JCAKw=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js" integrity="sha256-gJWdmuCRBovJMD9D/TVdo4TIK8u5Sti11764sZT1DhI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.2.13/jspdf.plugin.autotable.min.js" integrity="sha256-1gTovbU9vikIejcyjJKJce/HMA0eRnSWOed8ekl0Jgs=" crossorigin="anonymous"></script>
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
