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
                        <div class="content-inter-header">
                            <div>
                                <p>CARTA DE PORTE INTERNACIONAL</p>
                                <p>LETTRE DE VOITURE INTERNATIONALE</p>
                                <p>INTERNATIONAL CONSIGNMENT NOTE</p>
                            </div>
                            <div style="padding-top: 10%;">
                                <p>Ce transport est soumis, nonostant toute</p>
                                <p>clause contraire, a la Convention relative au</p>
                                <p>contrat de transport international de</p>
                                <p>marchandises par route (CMR)</p>
                            </div>
                        </div>
                        <div class="content-inter-header">
                            <div>
                                <p>Este transporte queda sometido, no obstante</p>
                                <p>toda clausula contraria, al Convenio sobre el</p>
                                <p>Contrato de Transporte Internacional de</p>
                                <p>Mercancias por Cretera (CMR)</p>
                            </div>
                            <div style="padding-top: 10%;">
                                <p>This carriage is subject, notwithstanding any</p>
                                <p>clause to the contrary, to the Convention</p>
                                <p>on the Contract for the International Carriage</p>
                                <p>of goods bu road (CMR)</p>
                            </div>
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
                    <div class="content-footer">
                        <div class="content-title">
                            <span>16</span>
                            <div>
                                <p>Reservas y observaciones del porteador</p>
                                <p>Reserves et observations du transporteur</p>
                                <p>Carrier's reservations and obervations</p>
                            </div>
                        </div>
                        <div class="observation">
                            <label class="info-text">{{$loadOrders->data_download->observations}}</label>
                        </div>
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
                <td class="td-l1" colspan="2" style="width: 20%;">
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
                <td class="td-l3" style="width: 17%;">
                    <div class="content-title">
                        <span>9</span>
                        <div>
                            <p>Naturaleza de la mercancia</p>
                            <p>Nature de la marchandise</p>
                            <p>Nature of the goods</p>
                        </div>
                    </div>
                </td>
                <td class="td-l4" colspan="2">
                    <div class="content-title">
                        <span>10</span>
                        <div>
                            <p class="text-xs-p">No Estadistico</p>
                            <p class="text-xs-p">No stadistiue</p>
                            <p class="text-xs-p">Statistical Number</p>
                        </div>
                    </div>
                </td>
                <td class="td-l4" colspan="2">
                    <div class="content-title">
                        <span>11</span>
                        <div>
                            <p class="text-xs-p">Peso bruto, Kg.</p>
                            <p class="text-xs-p">Poids brut, Kg.</p>
                            <p class="text-xs-p">Gross weight in Kg.</p>
                        </div>
                    </div>
                </td>
                <td class="td-l4" colspan="2">
                    <div class="content-title">
                        <span>12</span>
                        <div>
                            <p class="text-xs-p">Volumen m3</p>
                            <p class="text-xs-p">Cubage m3</p>
                            <p class="text-xs-p">Volume in m3</p>
                        </div>
                    </div>
                </td>
            </tr>
            @foreach($loadOrders->customer->infoCars AS $key => $infoCar)
                <tr>
                    <td class="{{$loadOrders->customer->infoCars->count() === ($key+1) ? 'td-l1-end' : 'td-l1'}}" colspan="2">
                        <div class="info-two">
                            <label>{{$infoCar->model_car}}</label>
                        </div>
                    </td>
                    <td class="td-l2" >
                        <div class="info-two">
                            <label class="info-text">{{$infoCar->vin}}</label>
                        </div>
                    </td>
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
                        <p>Classe<br><br><br>Class</p>
                        <p>Chiffre<br><br><br>Number</p>
                        <p>Lettre<br><br><br>Letter</p>
                        <p>(ADR*)</p>
                    </div>
                </td>
                <td class="td-l4" colspan="2">&nbsp;</td>
                <td class="td-l4" colspan="2">&nbsp;</td>
                <td class="td-l4" colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="4" rowspan="4">
                    <div class="content-title-13" >
                        <span>13</span>
                        <div>
                            <p>instrucciones del remitente / Instructions de l'espediteur / Sender's instructions</p>
                        </div>
                    </div>
                </td>
                <td colspan="7">
                    <div class="content-title" >
                        <span>17</span>
                        <div>
                            <p>estipulaciones particulares / Conventions particulieres / Special agreements</p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="">
                <td colspan="2">
                    <div class="div-double-border">
                        <span class="span-double-border">18</span>
                        <p> A pagar por:<br><br><br>to be paid by:</p>
                    </div>
                </td>
                <td colspan="2">Remitente <br>Senders</td>
                <td colspan="2">Moneda <br>Currency</td>
                <td colspan="2">Consignatario <br>Consignee</td>
            </tr>
            <tr class="tr-xs double-border">
                <td style="">
                    <p></p>
                    <p>Precio:</p>
                    <p>Carriage Charges:</p>
                    <p>Descuentos:</p>
                    <p>Deductions:</p>
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
                    <p>Supplem. charges:</p>
                    <p>Gastos accesorios:</p>
                    <p>Other charges:   +</p>
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="">
                <td colspan="4" rowspan="3">
                    <div class="content-title" >
                        <span>14</span>
                        <div>
                            <p>Formas de pago</p>
                            <p>Prescription d'affranchissement</p>
                            <p>Instructions  as to payment for carriage</p>
                        </div>
                    </div>
                    <div class="content-check">
                        <div>
                            <div class="frame-check"></div>
                            <span >Porte pagado / Franco / Carriage Paid</span>
                        </div>
                        <div>
                            <div class="frame-check"></div>
                            <span>Porte debido / Non franco / Carriage forward</span>
                        </div>
                    </div>
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
            <tr class="">
                <td colspan="4">
                    <div class="content-title" >
                        <span>19</span>
                        <div>
                            <p>Formalizado en</p>
                            <p>Etablie a</p>
                            <p>Established in</p>
                        </div>
                    </div>
                </td>
                <td colspan="7">
                    <div class="content-title" >
                        <span>15</span>
                        <div>
                            <p>Reembolso / Remboursement / Cash on delivery</p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr  class="">
                <td colspan="3">
                    <div class="content-footer">
                        <div class="content-title" >
                            <span>20</span>
                            <div>
                            </div>
                        </div>
                        <div class="footer-20">
                            <span>Firma y sello del remitente</span>
                            <span>Signature et timbre de l'expediteur</span>
                            <span>Signature and stamp of the sender</span>
                        </div>
                    </div>
                </td>
                <td class="td-logo-end" colspan="3">
                    <img src="{{asset('images/logo-mc.jpg')}}" alt="Mc Vehiculos">
                    <p>C/. Altagracia, 8 - 13003 CIUDAD REAL</p>
                    <p>Telf.: 926 228 453 - Fax 926 222 588</p>
                    <p>Movil: 629 423 149 - mcvehiculos1935@msn.com</p>
                    <p>TRANSCALYGUZ, S.L. / C.I.F.: B-I3523345</p>
                </td>
                <td colspan="5">
                    <div class="content-footer">
                        <div class="content-title" >
                            <span>21</span>
                            <div>
                                <p>Recibo de la mercancia / Marchandise recues / </p><br>
                                <p>Special agreements</p>
                            </div>
                        </div>
                        <div class="footer-20">
                            <span>Firma y sello del consignatario</span>
                            <span>Signature et timbre du destinataire</span>
                            <span>Signature and stamp of the consignee</span>
                        </div>
                    </div>
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
