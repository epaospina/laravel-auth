@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/cmr.css')}} ">
@endpush
@section('content')
    <div class="container-cmr">
        <table>
            <tbody>
            <tr>
                <td colspan="4">
                    <p>1. Remitente (nombre, domicilio, pais)</p>
                    <label class="info-text">{{$loadOrders->customer->signing}}</label><br>
                    <label class="info-text">{{$loadOrders->customer->addresses_load}}</label><br>
                    <label class="info-text">{{$loadOrders->customer->city_load}} // {{$loadOrders->customer->postal_cod_load}}</label>
                </td>
                <td colspan="7">
                    <div class="content-info">
                        <div>CARTA DE PORTE INTERNACIONAL</div>
                        <div>
                            <p>Este transporte queda sometido, no obstante</p>
                            <p>toda clausula contraria, al Convenio sobre el</p>
                            <p>contrato de transporte internacional de</p>
                            <p>mercancias por carretera</p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <p>2. Consignatario (nombre, domicilio, pais)</p>
                    <label class="info-text">{{$loadOrders->dataDownload->contact_download}}</label><br>
                    <label class="info-text">{{$loadOrders->dataDownload->addresses_download}}</label><br>
                    <label class="info-text">{{$loadOrders->dataDownload->city_download}} {{$loadOrders->dataDownload->postal_cod_download}}</label><br>
                </td>
                <td class="td-logo-start" colspan="7" rowspan="2">
                    <img src="{{asset('images/logo-mc.jpg')}}" alt="Mc Vehiculos">
                    <div>
                        <p>C/. Altagracia, 8 - 13003 CIUDAD REAL</p>
                        <p>Telf.: 926 228 453 - Fax 926 222 588</p>
                        <p>Movil: 629 423 149 - mcvehiculos1935@msn.com</p>
                        <p>TRANSCALYGUZ, S.L. / C.I.F.: B-I3523345</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <p>3. Lugar de entrega de la mercancia (lugar, pais)</p>
                    <label class="info-text">{{$loadOrders->dataDownload->contact_download}}</label><br>
                    <label class="info-text">{{$loadOrders->dataDownload->addresses_download}}</label><br>
                    <label class="info-text">{{$loadOrders->dataDownload->city_download}} {{$loadOrders->dataDownload->postal_cod_download}}</label><br>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <p>4. Lugar y fecha de carga de la mercancia (lugar, pais, fecha)</p>
                    <label class="info-text">{{$loadOrders->customer->addresses_load}}</label><br>
                    <label class="info-text">{{$loadOrders->customer->city_load}} // {{$loadOrders->customer->postal_cod_load}}</label><br>
                    <label class="info-text">{{$loadOrders->date_upload}}</label>
                </td>
                <td colspan="7" rowspan="2">
                    <div>
                        <p>16. Reservas y observaciones del porteador</p>
                        <br>
                        <br>
                        <br>
                        <label class="info-text">{{$loadOrders->dataDownload->observations}}</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4"><p>5. Documentos anexos</p></td>
            </tr>
            <tr>
                <td class="td-l1" colspan="2"><p>6. marcas y numeros</p></td>
                <td class="td-l2"><p>7. Numeros de bultos</p></td>
                <td class="td-l2" style="width: 12%;"><p>8. clase de embalaje</p></td>
                <td class="td-l3" style="width: 16%;"><p>9. Naturaleza de la mercancia</p></td><td class="td-l4" colspan="2"><p>10. No Estadistico</p></td>
                <td class="td-l4" colspan="2"><p>11. Peso bruto</p></td>
                <td class="td-l4" colspan="2"><p>12. Volumen</p></td>
            </tr>
            @foreach($loadOrders->customer->infoCars AS $key => $infoCar)
                <tr>
                    <td class="{{$loadOrders->customer->infoCars->count() === ($key+1) ? 'td-l1-end' : 'td-l1'}}" colspan="2"><label class="info-text">{{$infoCar->model_car}}</label></td>
                    <td class="td-l2" ><label class="info-text">{{$infoCar->vin}}</label></td>
                    <td class="td-l2" ><label class="info-text"></label></td>
                    <td class="td-l3" ><label class="info-text"></label></td>
                    <td class="td-l4" colspan="2">&nbsp;</td>
                    <td class="td-l4" colspan="2">&nbsp;</td>
                    <td class="td-l4" colspan="2">&nbsp;</td>
                </tr>
            @endforeach
            <tr class="tr-xs">
                <td colspan="5">
                    <div>
                        <p>Classe</p>
                        <p>Chiffre</p>
                        <p>Lettre</p>
                        <p>(ADR*)</p>
                    </div>
                </td>
                <td class="td-l4" colspan="2">&nbsp;</td>
                <td class="td-l4" colspan="2">&nbsp;</td>
                <td class="td-l4" colspan="2">&nbsp;</td>
            </tr>
            <tr class="tr-xs">
                <td colspan="4" rowspan="4">
                    <p>&nbsp; &nbsp; 13. instrucciones del remitente</p>
                    <p>&nbsp;</p>
                </td>
                <td colspan="7">17. estipulacion particulares</td>
            </tr>
            <tr class="tr-xs double-border">
                <td>&nbsp;18. A pagar por</td>
                <td colspan="2">Remitente</td>
                <td colspan="2">Moneda</td>
                <td colspan="2">
                    <p>consignatario</p>
                </td>
            </tr>
            <tr class="tr-xs double-border">
                <td style="">
                    <p>&nbsp;precio:</p>
                </td>
                <td style="width: 7%;">&nbsp;</td>
                <td style="width: 4%;">&nbsp;</td>
                <td style="width: 5%;">&nbsp;</td>
                <td style="width: 5%;">&nbsp;</td>
                <td style="width: 5%;">&nbsp;</td>
                <td style="width: 5%">&nbsp;</td>
            </tr>
            <tr class="tr-xs double-border">
                <td rowspan="3">
                    <p>Liquido/ Balance</p>
                    <p>suplementario</p>
                    <p>Gastos accesorios:&nbsp;</p>
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr-xs">
                <td colspan="4" rowspan="3">
                    <p>14. Formas de pago&nbsp;</p>
                    <label class="info-text"><input type="checkbox">Porte pagado</label><br>
                    <label class="info-text"><input type="checkbox">Porte debido</label><br>
                </td>
                <td>&nbsp;</td>
                <td class="double-border">&nbsp;</td>
                <td class="double-border">&nbsp;</td>
                <td class="double-border">&nbsp;</td>
                <td class="double-border">&nbsp;</td>
                <td class="double-border">&nbsp;</td>
            </tr>
            <tr  class="tr-xs double-border">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr-xs double-border">
                <td>TOTAL:</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr-xs">
                <td colspan="4">&nbsp;&nbsp;</td>
                <td colspan="7">&nbsp;</td>
            </tr>
            <tr  class="tr-xs">
                <td colspan="3">20</td>
                <td class="td-logo-end" colspan="3">
                    <img src="{{asset('images/logo-mc.jpg')}}" alt="Mc Vehiculos">
                    <p>C/. Altagracia, 8 - 13003 CIUDAD REAL</p>
                    <p>Telf.: 926 228 453 - Fax 926 222 588</p>
                    <p>Movil: 629 423 149 - mcvehiculos1935@msn.com</p>
                    <p>TRANSCALYGUZ, S.L. / C.I.F.: B-I3523345</p>
                </td>
                <td colspan="5">
                    <p>21. Recibo de la mercancia /</p>
                    <p>lugar</p>
                    <p>Firma / sello</p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
