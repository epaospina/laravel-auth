@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/clients.css')}} ">
@endpush
@section('content')
    <form id="regForm" action="{{ route('load-orders.store') }}" method="POST">
        @csrf

        <!-- One "tab" for each step in the form: -->
        <div class="tab">

            <h3 class="title-client">{{ __('clients.load_order') }}</h3>

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
            <div id="create_car">
                <div id="car__0">
                    @include('load-orders.create_car')
                </div>
            </div>
            <br>
            <div id="btnAddCar" class="btn btn-bitbucket" data-car="0" onclick="addCarForm()">Agregar coche</div>
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
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.contact_person') }}</span>
                </div>
                <input name="contact_person" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>
        </div>

        <div class="tab">

            <h5 class="subtitle-client">{{ __('clients.download_place') }}</h5>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.addresses') }}</span>
                </div>
                <input name="addresses_download" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.city') }}</span>
                </div>
                <input name="city_download" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.postal_cod') }}</span>
                </div>
                <input name="postal_cod_download" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.contact_person') }}</span>
                </div>
                <input name="contact_download" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>
            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.mobile') }}</span>
                </div>
                <input name="mobile_download" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            @if(auth()->id())
                <div class="input-group-sm mb-3 input-client">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.data_driver') }}</span>
                    </div>
                    <input value="_" name="data_driver" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>

                <div class="input-group-sm mb-3 input-client">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.cmr') }}</span>
                    </div>
                    <input value="_" name="cmr" type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            @endif

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
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Siguiente</button>
            </div>
        </div>

    </form>
@endsection
@push('js')
    <script src="{{asset('js/clients.js')}}"></script>
@endpush

