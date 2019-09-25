@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/cmr.css')}} ">
@endpush
@section('content')
    <div class="container-cmr" id="contentCmr">
        <table>
            <tbody>
                <tr>
                    <td>
                        <div class="info-one">
                            <label>{{$loadOrders->customer->signing}}</label><br>
                            <label>{{$loadOrders->customer->addresses_load}}</label><br>
                            <label>{{$loadOrders->customer->city_load}} // {{$loadOrders->customer->postal_cod_load}}</label>
                        </div>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <div class="info-one">
                            <label>{{$loadOrders->data_download->contact_download}}</label><br>
                            <label>{{$loadOrders->data_download->addresses_download}}</label><br>
                            <label>{{$loadOrders->data_download->city_download}} {{$loadOrders->data_download->postal_cod_download}}</label><br>
                        </div>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><div class="info-one">
                            <label class="info-text">{{$loadOrders->data_download->contact_download}}</label><br>
                            <label class="info-text">{{$loadOrders->data_download->addresses_download}}</label><br>
                            <label class="info-text">{{$loadOrders->data_download->city_download}} {{$loadOrders->data_download->postal_cod_download}}</label><br>
                        </div>
                    </td>

                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <div class="info-one">
                            <label class="info-text">{{$loadOrders->customer->addresses_load}}</label><br>
                            <label class="info-text">{{$loadOrders->customer->city_load}} // {{$loadOrders->customer->postal_cod_load}}</label><br>
                            <label class="info-text">{{$loadOrders->date_upload}}</label>
                        </div>
                    </td>
                    <td>
                        <div class="observation">
                            <label class="info-text">{{$loadOrders->data_download->observations}}</label>
                        </div>
                    </td>
                </tr>
                @foreach($loadOrders->customer->infoCars AS $key => $infoCar)
                    <tr>
                        <td>
                            <div class="info-one">
                                <label>{{$infoCar->model_car}}</label>
                                <label class="info-text">{{$infoCar->vin}}</label>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="btn btn-bitbucket" onclick="printTable('contentCmr')">IMPRIMIR</div>
@endsection
@push('js')
    <script src="{{asset('js/clients.js')}}"></script>
@endpush
