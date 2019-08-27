@extends('adminlte::page')
@push('css')
    <link rel="stylesheet"
          href="{{ asset('css/clients.css')}} ">
@endpush
@section('content')
    <form id="regForm" action="">

        <!-- One "tab" for each step in the form: -->
        <div class="tab">

            <h3 class="title-client">{{ __('clients.load_order') }}</h3>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.bill_to') }}</span>
                </div>
                <input type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.import_company') }}</span>
                </div>
                <input type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <h5 class="subtitle-client">{{ __('clients.data_car') }}</h5>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.model_car') }}</span>
                </div>
                <input type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.color_car') }}</span>
                </div>
                <input type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.chassis') }}</span>
                </div>
                <input type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.itv') }}</span>
                </div>
                <input type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.documents_car') }}</span>
                </div>
                <input type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>
        </div>

        <div class="tab">

            <h5 class="subtitle-client">{{ __('clients.load_place') }}</h5>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.signing') }}</span>
                </div>
                <input type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.addresses') }}</span>
                </div>
                <input type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.city') }}</span>
                </div>
                <input type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.postal_cod') }}</span>
                </div>
                <input type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.phone') }}</span>
                </div>
                <input type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.mobile') }}</span>
                </div>
                <input type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.fax') }}</span>
                </div>
                <input type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.person_contact') }}</span>
                </div>
                <input type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>
        </div>

        <div class="tab">

            <h5 class="subtitle-client">{{ __('clients.download_place') }}</h5>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.addresses') }}</span>
                </div>
                <input type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.city') }}</span>
                </div>
                <input type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.postal_cod') }}</span>
                </div>
                <input type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.mobile') }}</span>
                </div>
                <input type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.person_contact') }}</span>
                </div>
                <input type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.data_driver') }}</span>
                </div>
                <input type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.cmr') }}</span>
                </div>
                <input type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.observations') }}</span>
                </div>
                <input type="text" class="form-control" oninput="this.className = ''" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
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
    <script>
        console.log('ok');
    </script>
    <script src="{{asset('js/clients.js')}}"></script>
@endpush

