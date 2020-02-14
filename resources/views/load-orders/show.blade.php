@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/clients.css')}} ">
@endpush
@section('content')
    @if(auth()->id())
        <div class="action-div">
            <div class="btn btn-primary {{isset($edit) ? 'hide' : 'show'}} btn-print" onclick="printTable('ContentTable')">IMPRIMIR</div>
        </div>
    @endif
    <div id="ContentTable" class="container-order edit-load">
        <div class="header-logo">
            <div>
                <img src="{{asset('images/logo-mc.jpg')}}" alt="Mc Vehiculos">
                <div class="header-logo-span">
                    <span>C/. Altagracia, 8 - 13003 CIUDAD REAL - ESPAÑA</span>
                    <span>Telf.: 926 228 453 - Fax 926 222 588</span>
                </div>
            </div>
            <div class="transcaliguz">
                <p>TRANSCALYGUZ, S.L.</p>
                <p>C/. Altagracia, 8 </p>
                <p> 13003 CIUDAD REAL</p>
                <p>Telf.:926 228 453 / 629 423 149</p>
                <p>Fax: 926 222 588</p>
                <p>Email:mcvehiculos1935@msn.com</p>
                <p>C.I.F: B-13523345</p>
            </div>
        </div>
        <div class="title-client">
            <h3 class="title-client">{{ __('clients.load_order') }}</h3>
        </div>
        <table class="table-load-order" style="width: 100%;">
            <tbody>
            <tr class="subtitle-car">
                <td colspan="2">{{ __('clients.data_car') }}</td>
            </tr>
            <tr>
                <td  class="subtitle">{{ __('clients.model_car') }} / {{ __('clients.color_car') }}</td>
                <td><label>{{$infoArray['information_car']['model_car']}} // {{$infoArray['information_car']['color_car']}}</label></td>
            </tr>
            <tr>
                <td  class="subtitle">Fecha de carga</td>
                <td><label>{{$infoArray['data_load']['date_load']}}</label></td>
            </tr>
            <tr>
                <td class="subtitle">{{ __('clients.vin') }}</td>
                <td><label>{{$infoArray['information_car']['vin']}}</label></td>
            </tr>
            </tbody>
        </table>


        <table class="table-load-order" style="width: 100%;">
            <tbody>
            <tr class="subtitle-car">
                <td class="subtitle" colspan="2">{{ __('clients.load_place') }}</td>
            </tr>
            <tr>
                <td class="subtitle">{{ __('clients.signing') }}</td>
                <td><label>{{$infoArray['client']['signing']}}</label></td>
            </tr>
            <tr>
                <td class="subtitle">{{ __('clients.addresses') }}</td>
                <td><label>{{$infoArray['data_load']['addresses_load']}} // {{$infoArray['data_load']['city_load']}} // {{$infoArray['data_load']['postal_cod_load']}}</label></td>
            </tr>
            <tr>
                <td class="subtitle">{{ __('clients.phone') }}</td>
                <td><label>{{$infoArray['data_load']['phone_load']}}</label></td>
            </tr>
            <tr>
                <td class="subtitle">{{ __('clients.mobile') }}</td>
                <td><label>{{$infoArray['data_load']['mobile_load']}}</label></td>
            </tr>
            <tr>
                <td class="subtitle">{{ __('clients.fax') }}</td>
                <td><label>{{$infoArray['client']['email']}}</label></td>
            </tr>
            <tr>
                <td class="subtitle">{{ __('clients.contact_person') }}</td>
                <td><label>{{$infoArray['load_order']['contact_person']}}</label></td>
            </tr>
            </tbody>
        </table>

        <table class="table-load-order" style="width: 100%;">
            <tbody>
            <tr>
                <td class="subtitle">{{ __('clients.itv') }}</td>
                <td>No</td>
            </tr>
            <tr>
                <td class="subtitle">{{ __('clients.documents') }}</td>
                <td><label>{{$infoArray['information_car']['documents']}}</label></td>
            </tr>
            </tbody>
        </table>

        <table class="table-load-order" style="width: 100%;">
            <tbody>
            <tr>
                <td class="subtitle">{!! __('clients.bill_to') !!}</td>
                <td><label>{{$infoArray['load_order']['bill_to']}}</label></td>
                <td><label>{{$infoArray['load_order']['payment_type']}}</label></td>
            </tr>
            <tr>
                <td class="subtitle">{{ __('clients.import_company') }}</td>
                <td><label>{{$infoArray['load_order']['import_company']}}</label></td>
            </tr>
            <tr>
                <td class="subtitle">Forma de pago</td>
                <td><label>Transferencia Bancaria</label></td>
            </tr>
            <tr>
                <td class="subtitle">precio</td>
                <td><label>{{$infoArray['load_order']['price']}}</label></td>
            </tr>
            </tbody>
        </table>

        <table class="table-load-order" style="width: 100%;">
            <tbody>
            <tr>
                <td class="subtitle">{{ __('clients.download_place') }}</td>
                <td class="subtitle observation">{{ __('clients.observations') }}</td>
                <td class="subtitle-sign">{{__('clients.sign_seal')}}</td>
            </tr>
            <tr>
                <td><label>{{$infoArray['data_download']['addresses_download']}} // {{$infoArray['data_download']['city_download']}} // {{$infoArray['data_download']['postal_cod_download']}}</label></td>
                <td><label>{{$infoArray['data_download']['observations']}}</label></td>
                <td></td>
            </tr>
            <tr>
                <td class="subtitle">{{__('clients.mobile')}}</td>
                <td><label>{{$infoArray['data_download']['mobile_download']}}</label></td>
                @if(auth()->id() && !empty($infoArray['data_download']['driver_data']) || isset($edit))
                    <td><b  class="subtitle">{{__('clients.data_driver')}}:</b> <label>{{$infoArray['data_download']['driver_data']}}</label></td>
                @else
                    <td></td>
                @endif
            </tr>
            <tr>
                <td class="subtitle">{{__('clients.contact_person')}}</td>
                <td><label>{{$infoArray['data_download']['contact_download']}}</label></td>
                @if(auth()->id() && !empty($infoArray['data_download']['driver_data']) || isset($edit))
                    <td><b  class="subtitle">{{__('clients.cmr')}}:</b> <label>{{$infoArray['data_download']['cmr']}}</label></td>
                @else
                    <td></td>
                @endif
            </tr>
            </tbody>
        </table>
        <br>
        <br>
        <ul>
            <li>Es imprecindible que envien una autorizacion al proveedor autorizando a la empresa {{env('TITLE_HOME', 'MC Vehiculos')}} a poder retirar el vehiculo.</li>
            <li>En el casi de necesitar la identidad del conductor y matricula del camion, rogamos nos la pidan previamente.</li>
        </ul>
    </div>
@endsection
@push('js')
    <script src="{{asset('js/clients.js')}}"></script>
@endpush
