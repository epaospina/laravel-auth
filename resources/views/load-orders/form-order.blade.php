@push('css')
    <link rel="stylesheet" href="{{ asset('css/clients.css')}} ">
@endpush
<div id="ContentTable{{$key}}" class="container-order edit-load">
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
        @if(isset($edit))
            <button class="btn btn-bitbucket" id="editLoadOrder" onclick="editInputs('collapse{{$key}}')">
                <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-bitbucket" id="saveLoadOrder"
                    onclick="updatePost('{{$infoArray['load_order']['id']}}', 'collapse{{$key}}')" style="display: none">
                <i class="far fa-save"></i>
            </button>
        @endif
    </div>
    <table class="table-load-order" style="width: 100%;">
        <tbody>
        <tr class="subtitle-car">
            <td colspan="2">{{ __('clients.data_car') }}</td>
        </tr>
        <tr>
            <td  class="subtitle">{{ __('clients.model_car') }} / {{ __('clients.color_car') }}</td>
            <td><input id="modelColor" value="{{$infoCar['model_car']}} // {{$infoCar['color_car']}}" disabled></td>
        </tr>
        <tr>
            <td class="subtitle">{{ __('clients.vin') }}</td>
            <td>
                <input id="vin" value="{{$infoCar['vin']}}" disabled>
                <input type="hidden" id="vin_original" value="{{$infoCar['vin']}}" disabled>
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
            <td><input id="signing" value="{{$infoArray['client']['signing']}}" disabled></td>
        </tr>
        <tr>
            <td class="subtitle">{{ __('clients.addresses') }} <p class="street-title">( {{ __('clients.street') }} / {{ __('clients.city') }} / {{ __('clients.postal_cod') }})</p></td>
            <td><input id="addresses_load" value="{{$infoArray['data_load']['addresses_load']}} // {{$infoArray['data_load']['city_load']}} // {{$infoArray['data_load']['postal_cod_load']}}" disabled></td>
        </tr>
        <tr>
            <td class="subtitle">{{ __('clients.phone') }}</td>
            <td><input id="phone_load" value="{{$infoArray['data_load']['phone_load']}}" disabled></td>
        </tr>
        <tr>
            <td class="subtitle">{{ __('clients.mobile') }}</td>
            <td><input id="mobile_load" value="{{$infoArray['data_load']['mobile_load']}}" disabled></td>
        </tr>
        <tr>
            <td class="subtitle">{{ __('clients.fax') }}</td>
            <td><input id="fax" value="{{$infoArray['client']['email']}}" disabled></td>
        </tr>
        <tr>
            <td class="subtitle">{{ __('clients.contact_person') }}</td>
            <td><input id="contact_person" value="{{$infoArray['load_order']['contact_person']}}" disabled></td>
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
            <td><input id="documents" value="{{$infoCar['documents']}}" disabled></td>
        </tr>
        </tbody>
    </table>

    <table class="table-load-order" style="width: 100%;">
        <tbody>
        <tr>
            <td class="subtitle">{{ __('clients.bill_to') }}</td>
            <td><input id="bill_to" value="{{$infoArray['load_order']['bill_to']}}" disabled></td>
            <td><input id="bill_to" type="hidden" value="{{$infoArray['load_order']['payment_type']}}" disabled></td>
        </tr>
        <tr>
            <td class="subtitle">{{ __('clients.import_company') }}</td>
            <td><input id="import_company" value="{{$infoArray['load_order']['import_company']}}" disabled></td>
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
            <td><textarea class="footer-text-area" id="info_download" disabled>{{$infoArray['data_download']['addresses_download']}} // {{$infoArray['data_download']['city_download']}} // {{$infoArray['data_download']['postal_cod_download']}}</textarea></td>
            <td><textarea class="footer-text-area" id="observations" disabled>{{$infoArray['data_download']['observations']}}</textarea></td>
            <td></td>
        </tr>
        <tr>
            <td class="subtitle">{{__('clients.mobile')}}</td>
            <td><input id="mobile_download" value="{{$infoArray['data_download']['mobile_download']}}" disabled></td>
            @if(auth()->id() && !empty($infoArray['data_download']['driver_data']) || isset($edit))
                <td><b  class="subtitle">{{__('clients.data_driver')}}:</b> <input id="driver_data" value="{{$infoArray['data_download']['driver_data']}}" disabled></td>
            @else
                <td></td>
            @endif
        </tr>
        <tr>
            <td class="subtitle">{{__('clients.contact_person')}}</td>
            <td><input id="contact_download" value="{{$infoArray['data_download']['contact_download']}}" disabled></td>
            @if(auth()->id() && !empty($infoArray['data_download']['driver_data']) || isset($edit))
                <td><b  class="subtitle">{{__('clients.cmr')}}:</b> <input id="cmr" value="{{$infoArray['data_download']['cmr']}}" disabled></td>
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
        <div class="btn btn-primary {{isset($edit) ? 'hide' : 'show'}} btn-print" onclick="printTable('ContentTable{{$key}}')">IMPRIMIR</div>
    </div>
@endif
