@push('css')
    <link rel="stylesheet" href="{{ asset('css/clients.css')}} ">
@endpush
<div id="contentTable" class="container-order edit-load">
    <h3 class="title-client">EDITAR ORDEN DE CARGA
        @if(isset($edit))
            <button class="btn btn-bitbucket" id="editLoadOrder" onclick="editInputs('collapse')">
                <i class="fas fa-edit"></i>
                Editar
            </button>
            <button class="btn btn-bitbucket" id="saveLoadOrder"
                    onclick="updatePost('{{$infoArray['load_order']['id']}}', 'collapse')" style="display: none">
                <i class="far fa-save"></i>
                Guardar
            </button>
        @endif
        <span class="d-none" id="car_id">{{$infoArray["car_id"]}}</span>
    </h3>
    <div id="exportWord">
        <label>DATOS DEL VEHICULO / FAHRZEUGDATEN</label>
        <table class="table-load-order" style="width: 100%;">
            <tr>
                <td  class="subtitle">MARCA</td>
                <td>
                    <label>
                        <input id="marca_car" class="footer-text-area modelColor" value="{{$infoArray['information_car']['marca_car']}}" disabled />
                    </label>
                </td>
            </tr>
            <tr>
                <td  class="subtitle">Modelo - MODELL / Color - FARBE</td>
                <td>
                    <label>
                        <span class="d-none">Modelo</span>
                        <input id="model_car" class="footer-text-area modelColor" value="{{$infoArray['information_car']['model_car']}}" disabled />
                    </label>
                    <label>
                        <span class="d-none">Color</span>
                        <input id="color_car" class="footer-text-area modelColor" value="{{$infoArray['information_car']['color_car']}}" disabled />
                    </label>
                </td>
            </tr>
            <tr>
                <td class="subtitle">BASTIDOR / CHASSIS NUMBER</td>
                <td>
                    <label>
                        <input id="vin" class="footer-text-area modelColor" value="{{$infoArray['information_car']['vin']}}" disabled />
                        <label id="vin_original" class="footer-text-area modelColor d-none" >{{$infoArray['information_car']['vin']}}</label>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="subtitle">MATRICULA / PLATE NUMBER</td>
                <td>
                    <label>
                        <input id="plate_number" class="footer-text-area modelColor" value="{{$infoArray['information_car']['plate_number']}}" disabled />
                    </label>
                </td>
            </tr>
            <tr>
                <td class="subtitle">AUTORIZACIÓN</td>
                <td>
                    <label>
                        <input id="auto_id" class="footer-text-area modelColor" value="{{$infoArray['load_order']['auto_id']}}" disabled />
                    </label>
                </td>
            </tr>
            <tr>
                <td class="subtitle">NUMERO DE PICK UP</td>
                <td>
                    <label>
                        <input id="pick_up" class="footer-text-area modelColor" value="{{$infoArray['load_order']['pick_up']}}" disabled />
                    </label>
                </td>
            </tr>
        </table>
        <b>LUGAR DE CARGA / FAHRZEUGSTANTDORT</b>
        <table class="table-load-order" style="width: 100%;">
            <tr>
                <td class="subtitle">CONCESIONARIO / NOMBRE COMERCIAL</td>
                <td>
                    <label>
                        <input id="signing" class="footer-text-area modelColor" value="{{$infoArray['data_load']['signing']}}" disabled />
                    </label>
                </td>
            </tr>
            <tr>
                <td class="subtitle">DIRECCION / ADRESSE (CALLE, NUMERO)</td>
                <td>
                    <label>
                        <input id="addresses_load" class="footer-text-area modelColor" value="{{$infoArray['data_load']['addresses_load']}}" disabled />
                    </label>
                </td>
            </tr>
            <tr>
                <td class="subtitle">CIUDAD - CITY</td>
                <td>
                    <label>
                        <input id="city_load" class="footer-text-area modelColor" value="{{$infoArray['data_load']['city_load']}}" disabled />
                    </label>
                </td>
            </tr>
            <tr>
                <td class="subtitle">CODIGO POSTAL - POSTAL COD</td>
                <td>
                    <label>
                        <input id="postal_cod_load" class="footer-text-area modelColor" value="{{$infoArray['data_load']['postal_cod_load']}}" disabled />
                    </label>
                </td>
            </tr>
            <tr>
                <td class="subtitle">PERSONA DE CONTACTO / ANSPRECHPARTNER</td>
                <td>
                    <label>
                        <input id="contact_person" class="footer-text-area modelColor" value="{{$infoArray['data_load']['contact_person']}}" disabled />
                    </label>
                </td>
            </tr>
            <tr>
                <td class="subtitle">TELEFONO DE CONTACTO</td>
                <td>
                    <label>
                        <input id="mobile_load" class="footer-text-area modelColor" value="{{$infoArray['data_load']['mobile_load']}}" disabled />
                    </label>
                </td>
            </tr>
        </table>
        <b>LUGAR DE DESCARGA</b>
        <table class="table-load-order" style="width: 100%;">
            <tr>
                <td class="subtitle">CONCESIONARIO / NOMBRE COMERCIAL</td>
                <td>
                    <label>
                        <input id="signing_download" class="footer-text-area modelColor" value="{{$infoArray['data_download']['signing_download']}}" disabled />
                    </label>
                </td>
            </tr>
            <tr>
                <td class="subtitle">DIRECCION / ADRESSE (CALLE, NUMERO)</td>
                <td>
                    <label>
                        <input id="addresses_download" class="footer-text-area modelColor" value="{{$infoArray['data_download']['addresses_download']}}" disabled />
                    </label>
                </td>
            </tr>
            <tr>
                <td class="subtitle">CIUDAD - CITY</td>
                <td>
                    <label>
                        <input id="city_download" class="footer-text-area modelColor" value="{{$infoArray['data_download']['city_download']}}" disabled />
                    </label>
                </td>
            </tr>
            <tr>
                <td class="subtitle">CODIGO POSTAL - POSTAL COD</td>
                <td>
                    <label>
                        <input id="postal_cod_download" class="footer-text-area modelColor" value="{{$infoArray['data_download']['postal_cod_download']}}" disabled />
                    </label>
                </td>
            </tr>
            <tr>
                <td class="subtitle">PERSONA DE CONTACTO / ANSPRECHPARTNER</td>
                <td>
                    <label>
                        <input id="contact_download" class="footer-text-area modelColor" value="{{$infoArray['data_download']['contact_download']}}" disabled />
                    </label>
                </td>
            </tr>
            <tr>
                <td class="subtitle">TELEFONO DE CONTACTO</td>
                <td>
                    <label>
                        <input id="mobile_download" class="footer-text-area modelColor" value="{{$infoArray['data_download']['mobile_download']}}" disabled />
                    </label>
                </td>
            </tr>
        </table>

        <table class="table-load-order" style="width: 100%;">
            <tr>
                <td class="subtitle">Pasar ITV al vehiculo / TÜV</td>
                <td>No</td>
            </tr>
            <tr>
                <td class="subtitle">Documentacion del vehiculo / FAHRZEUGDOKUMENTE</td>
                <td>
                    <label>
                        <input id="documents" class="footer-text-area modelColor" value="{{$infoArray['information_car']['documents']}}" disabled />
                    </label>
                </td>
            </tr>
        </table>
        <br>
        <b>Datos de facturacion</b>
        <table class="table-load-order" style="width: 100%;">
            <tbody>
            <tr>
                <td class="subtitle">EMPRESA O PERSONA COMPRADORA DEL VEHICULO</td>
                <td>
                    <label>
                        <input id="bill_to" class="footer-text-area modelColor" value="{{$infoArray['load_order']['bill_to']}}" disabled />
                    </label>
                </td>
            </tr>
            <tr>
                <td class="subtitle">NUMERO DE IDENTIFICACION FISCAL (CIF/NIF/NIE)</td>
                <td>
                    <label>
                        <input id="identificacion_fiscal" class="footer-text-area modelColor" value="{{$infoArray['load_order']['identificacion_fiscal']}}" disabled />
                    </label>
                </td>
            </tr>
            <tr>
                <td class="subtitle">DOMICILIO FISCAL</td>
                <td>
                    <label>
                        <input id="domicilio_fiscal" class="footer-text-area modelColor" value="{{$infoArray['load_order']['domicilio_fiscal']}}" disabled />
                    </label>
                </td>
            </tr>
            <tr>
                <td class="subtitle">POBLACION / CODIGO POSTAL</td>
                <td>
                    <label>
                        <input id="poblacion" class="footer-text-area modelColor" value="{{$infoArray['load_order']['poblacion']}}" disabled />
                    </label>
                </td>
            </tr>
            @if($infoArray['load_order']['constancy'] !== ".")
                <tr>
                    <td class="subtitle">COCHE CONTRATADO POR TERCEROS:</td>
                    <td>
                        <label>
                            <input id="constancy" class="footer-text-area modelColor" value="{{$infoArray['load_order']['constancy']}}" disabled />
                        </label>
                    </td>
                </tr>
            @endisset
            <tr>
                <td class="subtitle">EMPRESA IMPORTADORA / IMPORT FIRMA</td>
                <td>
                    <label>
                        <input id="import_company" class="footer-text-area modelColor" value="{{$infoArray['load_order']['import_company']}}" disabled />
                    </label>
                </td>
            </tr>
            <tr>
                <td class="subtitle">FORMA DE PAGO</td>
                <td>
                    <label>
                        <input id="payment_type" class="footer-text-area modelColor" value="{{$infoArray['load_order']['payment_type']}}" disabled />
                    </label>
                </td>
            </tr>
            <tr>
                <td class="subtitle">PRECIO ACORDADO</td>
                <td>
                    <label>
                        <input id="price" class="footer-text-area modelColor" value="{{$infoArray['load_order']['price']}}" disabled />
                    </label>
                </td>
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
@if(auth()->id())
    <div class="action-div">
        <div class="btn btn-primary {{isset($edit) ? 'hide' : 'show'}} btn-print" onclick="printTable('ContentTable')">IMPRIMIR</div>
    </div>
@endif
@push('js')
    <script>
        $( document ).ready(function() {
            setTextareaHeight($('.mobile_download').val());
        });
    </script>
@endpush
