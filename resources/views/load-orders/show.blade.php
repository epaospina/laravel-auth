@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/clients.css')}} ">
    <link href="{{ asset('css/print_order.css')}}" media="print" rel="stylesheet" />
@endpush
@section('content')
    <div class="action-div">
        <div class="btn-group" role="group" aria-label="Basic example">
            <div class="btn btn-primary" onclick="printTable('contentTable')">IMPRIMIR</div>
            <div class="btn btn-secondary" onclick="exportPDF('contentTable')">PDF</div>
            <div class="btn btn-secondary" onclick="downWord('contentTable')">WORD</div>
        </div>
    </div>
    <div id="contentTable" class="container-order edit-load">
        <div class="header-logo">
            <div>
                <div>
                    <img src="{{asset('images/logoMC.png')}}" alt="Mc Vehiculos">
                </div>
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
        <div id="exportWord">
            <label>DATOS DEL VEHICULO / FAHRZEUGDATEN</label>
            <table class="table-load-order" style="width: 100%;">
                <tr>
                    <td  class="subtitle">Modelo - MODELL / Color - FARBE</td>
                    <td><label>{{$infoArray['information_car']['model_car']}} // {{$infoArray['information_car']['color_car']}}</label></td>
                </tr>
                <tr>
                    <td  class="subtitle">Fecha de carga</td>
                    <td><label>{{$infoArray['data_load']['date_load']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">BASTIDOR / MATRICULA</td>
                    <td><label>{{$infoArray['information_car']['vin']}}</label></td>
                </tr>
            </table>
            <br>
            <label>LUGAR DE CARGA / FAHRZEUGSTANTDORT</label>
            <table class="table-load-order" style="width: 100%;">
                <tr>
                    <td class="subtitle">Firma</td>
                    <td><label>{{$infoArray['client']['signing']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">Direccion / ADRESSE</td>
                    <td><label>{{$infoArray['data_load']['addresses_load']}} // {{$infoArray['data_load']['city_load']}} // {{$infoArray['data_load']['postal_cod_load']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">Telefono fijo / TELEFONO NR</td>
                    <td><label>{{$infoArray['data_load']['phone_load']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">Telefono movil / HANDY NR</td>
                    <td><label>{{$infoArray['data_load']['mobile_load']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">Correo Electronico / Email</td>
                    <td><label>{{$infoArray['client']['email']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">Persona de contacto / ANSPRECHPARTNER</td>
                    <td><label>{{$infoArray['load_order']['contact_person']}}</label></td>
                </tr>
            </table>

            <table class="table-load-order" style="width: 100%;">
                <tr>
                    <td class="subtitle">Pasar ITV al vehiculo / TÜV</td>
                    <td>No</td>
                </tr>
                <tr>
                    <td class="subtitle">Documentacion del vehiculo / FAHRZEUGDOKUMENTE</td>
                    <td><label>{{$infoArray['information_car']['documents']}}</label></td>
                </tr>
            </table>

            <table class="table-load-order" style="width: 100%;">
                <tbody>
                <tr>
                    <td class="subtitle">Facturar transporte a / TRANSPORT RECHNUNG AN</td>
                    <td><label>{{$infoArray['load_order']['bill_to']}}</label></td>
                </tr>
                @if($infoArray['load_order']['constancy'] !== ".")
                    <tr>
                        <td class="subtitle">Coche contratado por terceros para:</td>
                        <td><label>{{$infoArray['load_order']['constancy']}}</label></td>
                    </tr>
                @endisset
                <tr>
                    <td class="subtitle">Identificacion fiscal</td>
                    <td><label>{{$infoArray['load_order']['identificacion_fiscal']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">Domicilio fiscal</td>
                    <td><label>{{$infoArray['load_order']['domicilio_fiscal']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">Poblacion</td>
                    <td><label>{{$infoArray['load_order']['poblacion']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">empresa importadora / IMPORT FIRMA</td>
                    <td><label>{{$infoArray['load_order']['import_company']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">Forma de pago</td>
                    <td><label>{{$infoArray['load_order']['payment_type']}}</label></td>
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
                    <td class="subtitle">LUGAR DE DESCARGUE / LIEFERADRESSE</td>
                    <td class="subtitle observation">{{ __('clients.observations') }}</td>
                    <td class="subtitle-sign">{{__('clients.sign_seal')}}</td>
                </tr>
                <tr>
                    <td><label>{{$infoArray['data_download']['addresses_download']}} // {{$infoArray['data_download']['city_download']}} // {{$infoArray['data_download']['postal_cod_download']}}</label></td>
                    <td><label>{{$infoArray['data_download']['observations']}}</label></td>
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
    </div>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js" integrity="sha256-c3RzsUWg+y2XljunEQS0LqWdQ04X1D3j22fd/8JCAKw=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js" integrity="sha256-gJWdmuCRBovJMD9D/TVdo4TIK8u5Sti11764sZT1DhI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.2.13/jspdf.plugin.autotable.min.js" integrity="sha256-1gTovbU9vikIejcyjJKJce/HMA0eRnSWOed8ekl0Jgs=" crossorigin="anonymous"></script>
    <script src="{{asset('js/clients.js')}}"></script>
    <script>
        $(document).ready(function (){
            $( "#foo" ).trigger( "click" );
        })
    </script>
@endpush
