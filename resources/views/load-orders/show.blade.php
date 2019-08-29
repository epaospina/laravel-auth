@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/clients.css')}} ">
@endpush
@section('content')
    <div class="container-order">
        <h3 class="title-client">{{ __('clients.load_order') }}</h3>

        <table class="table-load-order" style="width: 100%;">
            <tbody>
            <tr class="subtitle-car">
                <td colspan="2">{{ __('clients.data_car') }}</td>
            </tr>
            <tr>
                <td>{{ __('clients.model_car') }} / {{ __('clients.color_car') }}</td>
                <td>{{$infoArray['modelColor']}}</td>
            </tr>
            <tr>
                <td>{{ __('clients.chassis') }}</td>
                <td>{{$infoArray['vin']}}</td>
            </tr>
            </tbody>
        </table>

        <table class="table-load-order" style="width: 100%;">
            <tbody>
            <tr class="subtitle-car">
                <td colspan="2">{{ __('clients.load_place') }}</td>
            </tr>
            <tr>
                <td>{{ __('clients.signing') }}</td>
                <td>{{$infoArray['name']}}</td>
            </tr>
            <tr>
                <td>{{ __('clients.addresses') }} ( {{ __('clients.street') }}, {{ __('clients.city') }} y {{ __('clients.postal_cod') }})</td>
                <td>{{$infoArray['address']}}</td>
            </tr>
            <tr>
                <td>{{ __('clients.phone') }}</td>
                <td>{{$infoArray['phone']}}</td>
            </tr>
            <tr>
                <td>{{ __('clients.mobile') }}</td>
                <td>{{$infoArray['mobile']}}</td>
            </tr>
            <tr>
                <td>{{ __('clients.fax') }}</td>
                <td>{{$infoArray['fax']}}</td>
            </tr>
            <tr>
                <td>{{ __('clients.person_contact') }}</td>
                <td>{{$infoArray['contact_person']}}</td>
            </tr>
            </tbody>
        </table>

        <table class="table-load-order" style="width: 100%;">
            <tbody>
            <tr>
                <td>{{ __('clients.itv') }}</td>
                <td>FALTA AGREGAR</td>
            </tr>
            <tr>
                <td>{{ __('clients.documents_car') }}</td>
                <td>{{$infoArray['documents']}}</td>
            </tr>
            </tbody>
        </table>

        <table class="table-load-order" style="width: 100%;">
            <tbody>
            <tr>
                <td>{{ __('clients.bill_to') }}</td>
                <td>{{$infoArray['buyer']}}</td>
            </tr>
            <tr>
                <td>{{ __('clients.import_company') }}</td>
                <td>{{$infoArray['importing_company']}}</td>
            </tr>
            </tbody>
        </table>

        <table class="table-load-order" style="width: 100%;">
            <tbody>
            <tr>
                <td>{{ __('clients.download_place') }}</td>
                <td>{{ __('clients.observations') }}</td>
                <td>{{__('clients.sign_seal')}}</td>
            </tr>
            <tr>
                <td>{{$infoArray['info_download']}}</td>
                <td>{{$infoArray['observations']}}</td>
                <td></td>
            </tr>
            <tr>
                <td>{{__('clients.mobile')}}</td>
                <td>{{$infoArray['mobile_download']}}</td>
                <td>{{__('clients.data_driver')}}: {{$infoArray['driver_data']}}</td>
            </tr>
            <tr>
                <td>{{__('clients.person_contact')}}</td>
                <td>{{$infoArray['contact_download']}}</td>
                <td>{{__('clients.cmr')}}: {{$infoArray['cmr']}}</td>
            </tr>
            </tbody>
        </table>
        <br>
        <br>
        <ul>
            <li>Es imprecindible que envien una autorizacion al proveedor autorizando a la empresa {{env('TITLE_HOME')}} a poder retirar el vehiculo.</li>
            <li>En el casi de necesitar la identidad del conductor y matricula del camion, rogamos nos la pidan previamente.</li>
        </ul>
    </div>
@endsection
