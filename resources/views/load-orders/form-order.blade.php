@push('css')
    <link rel="stylesheet" href="{{ asset('css/clients.css')}} ">
@endpush
<div id="contentTable" class="container-order edit-load">
    <div class="title-client">
        <h3 class="title-client">EDITAR ORDEN DE CARGA</h3>
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
    </div>
    <input type="hidden" id="country_download" disabled value="{{$infoArray['data_download']['country_download']}}">
    <input type="hidden" id="country_load" disabled value="{{$infoArray['data_load']['country_load']}}">
    <table class="table-load-order" style="width: 100%;">
        <tbody>
        <tr class="subtitle-car">
            <td colspan="2">{{ __('clients.data_car') }}</td>
        </tr>
        <tr>
            <td  class="subtitle">{{ __('clients.model_car') }} / {{ __('clients.color_car') }}</td>
            <td><input class="footer-text-area modelColor" value="{{$infoArray['information_car']['model_car']}} // {{$infoArray['information_car']['color_car']}}" disabled /></td>
        </tr>
        <tr>
            <td  class="subtitle">Fecha de carga</td>
            <td><input class="footer-text-area date_load" disabled value="{{$infoArray['data_load']['date_load']}}"></td>
        </tr>

        <tr>
            <td class="subtitle">{{ __('clients.vin') }}</td>
            <td>
                <input class="footer-text-area vin" disabled value="{{$infoArray['information_car']['vin']}}"/>
                <input type="hidden" class="vin_original" value="{{$infoArray['information_car']['vin']}}" disabled>
            </td>
        </tr>

        <tr>
            <td class="subtitle">{{ __('clients.plate_number') }}</td>
            <td>
                <input class="footer-text-area plate_number" disabled value="{{$infoArray['information_car']['plate_number']}}"/>
            </td>
        </tr>

        <tr>
            <td class="subtitle">AUTO ID</td>
            <td>
                <input class="footer-text-area auto_id" disabled value="{{$infoArray['load_order']['auto_id']}}"/>
            </td>
        </tr>

        <tr>
            <td class="subtitle">PICK UP NUM</td>
            <td>
                <input class="footer-text-area pick_up" disabled value="{{$infoArray['load_order']['pick_up']}}"/>
            </td>
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
            <td><input class="footer-text-area signing" value="{{$infoArray['client']['signing']}}" disabled>
            </td>
        </tr>
        <tr>
            <td class="subtitle">{{ __('clients.addresses') }}</td>
            <td><input class="footer-text-area addresses_load" value="{{$infoArray['data_load']['addresses_load']}} // {{$infoArray['data_load']['city_load']}} // {{$infoArray['data_load']['postal_cod_load']}}" disabled></td>
        </tr>
        <tr>
            <td class="subtitle">{{ __('clients.phone') }}</td>
            <td><input class="phone_load" value="{{$infoArray['data_load']['phone_load']}}" disabled></td>
        </tr>
        <tr>
            <td class="subtitle">{{ __('clients.mobile') }}</td>
            <td><input class="mobile_load" value="{{$infoArray['data_load']['mobile_load']}}" disabled></td>
        </tr>
        <tr>
            <td class="subtitle">{{ __('clients.fax') }}</td>
            <td><input class="fax" value="{{$infoArray['client']['email']}}" disabled></td>
        </tr>
        <tr>
            <td class="subtitle">{{ __('clients.contact_person') }}</td>
            <td><input class="contact_person" value="{{$infoArray['load_order']['contact_person']}}" disabled></td>
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
            <td><input class="documents" value="{{$infoArray['information_car']['documents']}}" disabled></td>
        </tr>
        </tbody>
    </table>

    <table class="table-load-order" style="width: 100%;">
        <tbody>
        <tr>
            <td class="subtitle">{!! __('clients.bill_to') !!}</td>
            <td><input class="bill_to" value="{{$infoArray['load_order']['bill_to']}}" disabled></td>
        </tr>
        @if($infoArray['load_order']['constancy'] !== ".")
            <tr>
                <td class="subtitle">Coche contratado por terceros para:</td>
                <td><label>{{$infoArray['load_order']['constancy']}}</label></td>
            </tr>
        @endisset
        <tr>
            <td class="subtitle">Identificacion fiscal</td>
            <td><input class="identificacion_fiscal" value="{{$infoArray['load_order']['identificacion_fiscal']}}" disabled></td>
        </tr>
        <tr>
            <td class="subtitle">Domicilio fiscal</td>
            <td><input class="domicilio_fiscal" value="{{$infoArray['load_order']['domicilio_fiscal']}}" disabled></td>
        </tr>
        <tr>
            <td class="subtitle">Poblacion</td>
            <td><input class="poblacion" value="{{$infoArray['load_order']['poblacion']}}" disabled></td>
        </tr>
        <tr>
            <td class="subtitle">{{ __('clients.import_company') }}</td>
            <td><input class="import_company" value="{{$infoArray['load_order']['import_company']}}" disabled></td>
        </tr>

        <tr>
            <td class="subtitle">Forma de pago</td>
            <td>
                <select class="custom-select" onchange="changeType(this)" name="payment_type">
                    {{--<option value="0"><b>Seleccione una opcion</b></option>--}}
                    <option value="Transferencia Bancaria"><b>Transferencia Bancaria</b></option>
                    <option value="Recibo de banco"><b>Recibo de banco</b></option>
                    <option value="otros"><b>otros</b></option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="subtitle">precio</td>
            <td><input class="price" value="{{$infoArray['load_order']['price']}}" disabled></td>
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
            <td><textarea class="footer-text-area info_download" disabled>{{$infoArray['data_download']['addresses_download']}} // {{$infoArray['data_download']['city_download']}} // {{$infoArray['data_download']['postal_cod_download']}}</textarea></td>
            <td><textarea class="footer-text-area observations" disabled>{{$infoArray['data_download']['observations']}}</textarea></td>
            <td></td>
        </tr>
        <tr>
            <td class="subtitle">{{__('clients.mobile')}}</td>
            <td><input class="mobile_download" value="{{$infoArray['data_download']['mobile_download']}}" disabled></td>
            @if(auth()->id() && !empty($infoArray['data_download']['driver_data']))
                <td><b  class="subtitle">{{__('clients.data_driver')}}:</b> <input class="driver_data" value="{{$infoArray['data_download']['driver_data']}}" disabled></td>
            @else
                <td></td>
            @endif
        </tr>
        <tr>
            <td class="subtitle">{{__('clients.contact_person')}}</td>
            <td><input class="contact_download" value="{{$infoArray['data_download']['contact_download']}}" disabled></td>
            @if(auth()->id() && !empty($infoArray['data_download']['driver_data']))
                <td><b  class="subtitle">{{__('clients.cmr')}}:</b> <input class="cmr" value="{{$infoArray['data_download']['cmr']}}" disabled></td>
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
