@push('css')
    <link rel="stylesheet" href="{{ asset('css/clients.css')}} ">
@endpush
<div class="container-order edit-load">
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
            <td><input id="vin" value="{{$infoCar['vin']}}" disabled><input type="hidden" id="vin_original" value="{{$infoCar['vin']}}" disabled></td>
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
            <td class="subtitle">{{ __('clients.addresses') }} ( {{ __('clients.street') }} {{ __('clients.city') }} y {{ __('clients.postal_cod') }})</td>
            <td><input id="addresses_load" value="{{$infoArray['client']['addresses_load']}} // {{$infoArray['client']['city_load']}} // {{$infoArray['client']['postal_cod_load']}}" disabled></td>
        </tr>
        <tr>
            <td class="subtitle">{{ __('clients.phone') }}</td>
            <td><input id="phone_load" value="{{$infoArray['client']['phone_load']}}" disabled></td>
        </tr>
        <tr>
            <td class="subtitle">{{ __('clients.mobile') }}</td>
            <td><input id="mobile_load" value="{{$infoArray['client']['mobile_load']}}" disabled></td>
        </tr>
        <tr>
            <td class="subtitle">{{ __('clients.fax') }}</td>
            <td><input id="fax" value="{{$infoArray['client']['fax']}}" disabled></td>
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
            <td>FALTA AGREGAR</td>
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
            <td class="subtitle">{{ __('clients.observations') }}</td>
            <td class="subtitle">{{__('clients.sign_seal')}}</td>
        </tr>
        <tr>
            <td><textarea id="info_download" disabled>{{$infoArray['data_download']['addresses_download']}} // {{$infoArray['data_download']['city_download']}} // {{$infoArray['data_download']['postal_cod_download']}}</textarea></td>
            <td><textarea id="observations" disabled>{{$infoArray['data_download']['observations']}}</textarea></td>
            <td></td>
        </tr>
        <tr>
            <td class="subtitle">{{__('clients.mobile')}}</td>
            <td><input id="mobile_download" value="{{$infoArray['data_download']['mobile_download']}}" disabled></td>
            @if(auth()->id())
                <td><b  class="subtitle">{{__('clients.data_driver')}}:</b> <input id="driver_data" value="{{$infoArray['data_download']['driver_data']}}" disabled></td>
            @else
                <td></td>
            @endif
        </tr>
        <tr>
            <td class="subtitle">{{__('clients.contact_person')}}</td>
            <td><input id="contact_download" value="{{$infoArray['data_download']['contact_download']}}" disabled></td>
            @if(auth()->id())
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
