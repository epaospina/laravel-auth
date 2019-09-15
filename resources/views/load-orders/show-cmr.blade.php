@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/cmr.css')}} ">
@endpush
@section('content')
    <div class="container-cmr" id="contentCmr">
        <table>
            <tbody>
            <tr>
                <td colspan="4">
                    <div class="content-title">
                        <span>1</span>
                        <div>
                            <p>Remitente (nombre, domicilio, pais)</p>
                            <p>Expediteur (nom, adresse, pays)</p>
                            <p>Sender (name, address, country)</p>
                        </div>
                    </div>
                    <div class="info-one">
                        <label>{{$loadOrders->customer->signing}}</label><br>
                        <label>{{$loadOrders->customer->addresses_load}}</label><br>
                        <label>{{$loadOrders->customer->city_load}} // {{$loadOrders->customer->postal_cod_load}}</label>
                    </div>
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
                    <div class="content-title">
                        <span>2</span>
                        <div>
                            <p>Consignatario (nombre, domicilio, pais)</p>
                            <p>Destinataire (nom, adresse, pays)</p>
                            <p>Consignee (name, address, country)</p>
                        </div>
                    </div>
                    <div class="info-one">
                        <label>{{$loadOrders->data_download->contact_download}}</label><br>
                        <label>{{$loadOrders->data_download->addresses_download}}</label><br>
                        <label>{{$loadOrders->data_download->city_download}} {{$loadOrders->data_download->postal_cod_download}}</label><br>
                    </div>
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
                    <div class="content-title">
                        <span>3</span>
                        <div>
                            <p>Lugar de entrega de la mercancia (lugar, pais)</p>
                            <p>Lieu et date de la prise en charge de ka carchandise (lieu, pays)</p>
                            <p>Place of delivery of the goods (place, country)</p>
                        </div>
                    </div>
                    <div class="info-one">
                        <label class="info-text">{{$loadOrders->data_download->contact_download}}</label><br>
                        <label class="info-text">{{$loadOrders->data_download->addresses_download}}</label><br>
                        <label class="info-text">{{$loadOrders->data_download->city_download}} {{$loadOrders->data_download->postal_cod_download}}</label><br>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <div class="content-title">
                        <span>4</span>
                        <div>
                            <p>Lugar y fecha de carga de la mercancia (lugar, pais, fecha)</p>
                            <p>Lieu et date de la prise en charge de ka carchandise (lieu, pays)</p>
                            <p>Place and date of taking over the goods (place, country, date)</p>
                        </div>
                    </div>
                    <div class="info-one">
                        <label class="info-text">{{$loadOrders->customer->addresses_load}}</label><br>
                        <label class="info-text">{{$loadOrders->customer->city_load}} // {{$loadOrders->customer->postal_cod_load}}</label><br>
                        <label class="info-text">{{$loadOrders->date_upload}}</label>
                    </div>
                </td>
                <td colspan="7" rowspan="2">
                    <div>
                        <p>16. Reservas y observaciones del porteador</p>
                        <br>
                        <br>
                        <br>
                        <label class="info-text">{{$loadOrders->data_download->observations}}</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <div class="content-title">
                        <span>5</span>
                        <div>
                            <p>Documentos anexos / Documents annexes / Documents attached</p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="td-l1" colspan="2" style="width: 22%;">
                    <div class="content-title">
                        <span>6</span>
                        <div>
                            <p>Marcas y numeros</p>
                            <p>Marques et numeros</p>
                            <p>Marks and Nos</p>
                        </div>
                    </div>
                </td>
                <td class="td-l2" style="width: 15%;">
                    <div class="content-title">
                        <span>7</span>
                        <div>
                            <p>Numeros de bultos</p>
                            <p>Nombre des colis</p>
                            <p>Number of packages</p>
                        </div>
                    </div>
                </td>
                <td class="td-l2" style="width: 12%;">
                    <div class="content-title">
                        <span>8</span>
                        <div>
                            <p>Clase de embalaje</p>
                            <p>Mode d'emballage</p>
                            <p>Method of packing</p>
                        </div>
                    </div>
                </td>
                <td class="td-l3" style="width: 16%;">
                    <div class="content-title">
                        <span>9</span>
                        <div>
                            <p>Naturaleza de la mercancia</p>
                            <p>Nature de la marchandise</p>
                            <p>Nature of the goods</p>
                        </div>
                    </div>
                </td><td class="td-l4" colspan="2">
                    <div class="content-title">
                        <span>10</span>
                        <div>
                            <p>No Estadistico</p>
                            <p>No stadistiue</p>
                            <p>Statistical Number</p>
                        </div>
                    </div>
                </td>
                <td class="td-l4" colspan="2">
                    <div class="content-title">
                        <span>11</span>
                        <div>
                            <p>Peso bruto, Kg.</p>
                            <p>Poids brut, Kg.</p>
                            <p>Gross weight in Kg.</p>
                        </div>
                    </div>
                </td>
                <td class="td-l4" colspan="2">
                    <div class="content-title">
                        <span>12</span>
                        <div>
                            <p>Volumen m3</p>
                            <p>Cubage m3</p>
                            <p>Volume in m3</p>
                        </div>
                    </div>
                </td>
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
    <div class="btn btn-bitbucket" onclick="printTable('contentCmr')">IMPRIMIR</div>
@endsection
@push('js')
    <script>
        function printTable(divName) {
            let printContents = document.getElementById(divName).innerHTML;
            let originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
@endpush
