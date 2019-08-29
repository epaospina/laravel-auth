@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/clients.css')}} ">
@endpush
@section('content')
    <form id="regForm" action="{{ route('load-orders.store') }}" method="POST">
        @csrf

        <!-- One "tab" for each step in the form: -->
        <div class="tab">

            <h3 class="title-client">{{ __('load_orders') }}</h3>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.bill_to') }}</span>
                </div>
                <input name="bill_to" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.import_company') }}</span>
                </div>
                <input name="import_company" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <h5 class="subtitle-client">{{ __('clients.data_car') }}</h5>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('load_orders') }}</span>
                </div>
                <input name="model_car" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.color_car') }}</span>
                </div>
                <input name="color_car" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.chassis') }}</span>
                </div>
                <input name="chassis" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.itv') }}</span>
                </div>
                <input name="itv" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.documents_car') }}</span>
                </div>
                <input name="documents_car" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>
        </div>

        <div class="tab">

            <h5 class="subtitle-client">{{ __('clients.load_place') }}</h5>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.signing') }}</span>
                </div>
                <input name="signing" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.addresses') }}</span>
                </div>
                <input name="addresses_load" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.city') }}</span>
                </div>
                <input name="city_load" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.postal_cod') }}</span>
                </div>
                <input name="postal_cod_load" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.phone') }}</span>
                </div>
                <input name="phone_load" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.mobile') }}</span>
                </div>
                <input name="mobile_load" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.fax') }}</span>
                </div>
                <input name="fax" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.person_contact') }}</span>
                </div>
                <input name="person_contact" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>
        </div>

        <div class="tab">

            <h5 class="subtitle-client">{{ __('clients.download_place') }}</h5>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.info_download') }}</span>
                </div>
                <input name="info_download" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.person_contact') }}</span>
                </div>
                <input name="person_contact_download" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>
            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.mobile') }}</span>
                </div>
                <input name="mobile_download" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.data_driver') }}</span>
                </div>
                <input name="data_driver" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.cmr') }}</span>
                </div>
                <input name="cmr" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.observations') }}</span>
                </div>
                <input name="observations" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>
        </div>

        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>

        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
        </div>

    </form>
@endsection
@push('js')
    <script src="{{asset('js/clients.js')}}"></script>
@endpush

