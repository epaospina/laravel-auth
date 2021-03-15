@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/clients.css')}} ">
    <link href="{{ asset('css/print_order.css')}}" media="print" rel="stylesheet" />
    <style>
        td{
            font-size: 13px !important;
        }
        label{
            font-size: 14px !important;
        }
        @page
        {
            font-size: 15px;
            margin: 30mm 0 0 40mm;
        }
    </style>
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
                <div style="margin-top: -54px;">
                    <img src="{{asset('images/logoMC.png')}}" alt="Mc Vehiculos">
                </div>
                <div class="header-logo-span">
                </div>
            </div>
            <div class="transcaliguz">
                <p>TRANSCALYGUZ, S.L.</p>
                <p>C/. Altagracia, 8 </p>
                <p> 13003 CIUDAD REAL</p>
                <p>Telf.926 228 453</p>
                <p>Email:mcvehiculos1935@msn.com</p>
                <p>C.I.F: B-13523345</p>
            </div>
        </div>
        <div id="exportWord">
            <label>DATOS DEL VEHICULO / FAHRZEUGDATEN</label>
            <table class="table-load-order" style="width: 100%;">
                <tr>
                    <td  class="subtitle">MARCA</td>
                    <td><label>{{$infoArray['information_car']['model_car']}} - {{$infoArray['information_car']['marca_car']}}</label></td>
                </tr>
                <tr>
                    <td  class="subtitle">Modelo - MODELL / Color - FARBE</td>
                    <td><label>{{$infoArray['information_car']['model_car']}} - {{$infoArray['information_car']['color_car']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">BASTIDOR / CHASSIS NUMBER</td>
                    <td><label>{{$infoArray['information_car']['vin']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">MATRICULA / PLATE NUMBER</td>
                    <td><label>{{$infoArray['information_car']['plate_number']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">AUTORIZACIÓN</td>
                    <td><label>{{$infoArray['load_order']['auto_id']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">NUMERO DE PICK UP</td>
                    <td><label>{{$infoArray['load_order']['pick_up']}}</label></td>
                </tr>
            </table>
            <b>LUGAR DE CARGA / FAHRZEUGSTANTDORT</b>
            <table class="table-load-order" style="width: 100%;">
                <tr>
                    <td class="subtitle">CONCESIONARIO / NOMBRE COMERCIAL</td>
                    <td><label>{{$infoArray['data_load']['signing']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">DIRECCION / ADRESSE (CALLE, NUMERO)</td>
                    <td><label>{{$infoArray['data_load']['addresses_load']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">CIUDAD - CITY</td>
                    <td><label>{{$infoArray['data_load']['city_load']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">CODIGO POSTAL - POSTAL COD</td>
                    <td><label>{{$infoArray['data_load']['postal_cod_load']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">PERSONA DE CONTACTO / ANSPRECHPARTNER</td>
                    <td><label>{{$infoArray['data_load']['contact_person']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">TELEFONO DE CONTACTO</td>
                    <td><label>{{$infoArray['data_load']['mobile_load']}}</label></td>
                </tr>
            </table>
            <b>LUGAR DE DESCARGA</b>
            <table class="table-load-order" style="width: 100%;">
                <tr>
                    <td class="subtitle">CONCESIONARIO / NOMBRE COMERCIAL</td>
                    <td><label>{{$infoArray['data_download']['signing_download']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">DIRECCION / ADRESSE (CALLE, NUMERO)</td>
                    <td><label>{{$infoArray['data_download']['addresses_download']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">CIUDAD - CITY</td>
                    <td><label>{{$infoArray['data_download']['city_download']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">CODIGO POSTAL - POSTAL COD</td>
                    <td><label>{{$infoArray['data_download']['postal_cod_download']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">PERSONA DE CONTACTO / ANSPRECHPARTNER</td>
                    <td><label>{{$infoArray['data_download']['contact_download']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">TELEFONO DE CONTACTO</td>
                    <td><label>{{$infoArray['data_download']['mobile_download']}}</label></td>
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
            <br>
            <b>Datos de facturacion</b>
            <table class="table-load-order" style="width: 100%;">
                <tbody>
                <tr>
                    <td class="subtitle">EMPRESA O PERSONA COMPRADORA DEL VEHICULO</td>
                    <td><label>{{$infoArray['load_order']['bill_to']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">NUMERO DE IDENTIFICACION FISCAL (CIF/NIF/NIE)</td>
                    <td><label>{{$infoArray['load_order']['identificacion_fiscal']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">DOMICILIO FISCAL</td>
                    <td><label>{{$infoArray['load_order']['domicilio_fiscal']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">POBLACION / CODIGO POSTAL</td>
                    <td><label>{{$infoArray['load_order']['poblacion']}}</label></td>
                </tr>
                @if($infoArray['load_order']['constancy'] !== ".")
                    <tr>
                        <td class="subtitle">COCHE CONTRATADO POR TERCEROS:</td>
                        <td><label>{{$infoArray['load_order']['constancy']}}</label></td>
                    </tr>
                @endisset
                <tr>
                    <td class="subtitle">EMPRESA IMPORTADORA / IMPORT FIRMA</td>
                    <td><label>{{$infoArray['load_order']['import_company']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">FORMA DE PAGO</td>
                    <td><label>{{$infoArray['load_order']['payment_type']}}</label></td>
                </tr>
                <tr>
                    <td class="subtitle">PRECIO ACORDADO</td>
                    <td><label>{{$infoArray['load_order']['price']}}</label></td>
                </tr>
                </tbody>
            </table>

            <table class="table-load-order" style="width: 100%;">
                <tbody>
                <tr>
                    <td class="subtitle">FECHA</td>
                    <td class="subtitle observation">{{$infoArray['data_load']['date_load']}}</td>
                    <td class="subtitle-sign">{{__('clients.sign_seal')}}</td>
                </tr>
                <tr>
                    <td><label>FIRMA</label></td>
                    <td>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </td>
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
