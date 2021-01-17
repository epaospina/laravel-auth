@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/cmr.css')}} ">
    <link href="{{ asset('css/print_cmr.css')}}" media="print" rel="stylesheet" />
@endpush
@section('content')

    <div class="action-div">
        <div class="btn-group" role="group" aria-label="Basic example">
            <div class="btn btn-primary" onclick="printTable('contentCmr')">IMPRIMIR</div>
            <div class="btn btn-secondary" onclick="downWord('contentCmr')">WORD</div>
        </div>
        <br>
        <form action="{{route('cmr-pdf')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="matricula" id="matricula">
            <input type="hidden" name="date" id="date">
            <input type="hidden" name="typeCoche" id="typeCoche">
            <input type="hidden" value="{{$loadOrders->id}}" name="loadOrder" id="loadOrder">
            <button type="submit" class="btn btn-primary">PDF</button>
        </form>
    </div>
    <div class="card m-3">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Ingrese o modifique la matricula para el camion</label>
                <input onkeyup="cmrCompleteMatricula($(this))" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Matricula del camion">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ingrese o modifique una fecha de alta</label>
                <input onchange="cmrCompleteDate($(this))" type="email" class="form-control" aria-describedby="emailHelp" id="inputDate" placeholder="Modificar Fecha">
            </div>
            <div class="form-check">
                <input onclick="cmrCompleteCocheUsado()" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1">
                <label class="form-check-label" for="exampleRadios1">
                    Coches Usados
                </label>
            </div>
            <div class="form-check">
                <input onclick="cmrCompleteCocheNuevo()" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2">
                <label class="form-check-label" for="exampleRadios2">
                    Coches Nuevos
                </label>
            </div>
        </div>
    </div>
    <div class="container-cmr" id="contentCmr">
        <div class="info-one">
            <label>
                {{$loadOrders->customer->signing}}<br>
                {{$loadOrders->data_load->addresses_load}}<br>
                {{$loadOrders->data_load->city_load}}, {{$loadOrders->data_load->postal_cod_load}}<br>
            </label>
        </div>

        <label class="info-two">
            {{$loadOrders->bill_to}}<br>
            {{$loadOrders->data_download->addresses_download}}<br>
            {{$loadOrders->data_download->city_download}} {{$loadOrders->data_download->postal_cod_download}}
        </label>
        <div class="matricula-camion">
            <span id="span-matricula">Matricula</span>
        </div>

        <div class="info-three">
            <label>
                {{$loadOrders->data_download->addresses_download}}<br>
                {{$loadOrders->data_download->city_download}} {{$loadOrders->data_download->postal_cod_download}}
            </label>
        </div>

        <label class="info-four">
            {{$loadOrders->data_load->date_load}}
            {{$loadOrders->data_load->addresses_load}}<br>
            {{$loadOrders->data_load->city_load}}, {{$loadOrders->data_load->postal_cod_load}}<br>
        </label>

        <div class="observation">
            <label class="info-text" id="observationLabel"></label>
        </div>

        <div class="info-cars">
            @foreach($loadOrders->customer->infoCars AS $key => $infoCar)
                <div id="car_{{$key}}">
                    <label>{{$infoCar->model_car}}</label>
                    <label>{{$infoCar->vin}}</label>
                    <button class="btn" onclick="$('#car_{{$key}}').remove()">X</button>
                </div>
            @endforeach
        </div>

        <div class="info-five">
            <label>
                <span id="span-date_load">
                    {{$loadOrders->data_load->city_load}}
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    {{isset($date) ? $date : $loadOrders->data_load->date_load}}
                </span>
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

            $( "#exampleRadios2" ).trigger( "click" );
        });
    </script>
@endpush
