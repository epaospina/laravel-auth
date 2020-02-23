@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/clients.css')}} ">
@endpush
@section('content')
    @if($errors->any())
        <div class="alert alert-personalized" role="alert">
            <strong>{{$errors->first()}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form id="regForm" action="{{ route('load-orders.store') }}" method="POST">
        @csrf
        <div class="tab">
            <h3 class="title-client">{{ __('clients.load_order') }}</h3>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.bill_to') }}</span>
                </div>
                <input id="bill_to" onkeyup="searchCustomer(this)" name="bill_to" type="text" value="{{old('bill_to')}}" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>
            <div id="customerComplete"></div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.import_company') }}</span>
                </div>
                <input name="import_company" value="{{old('import_company')}}" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group-sm mb-3 input-client col-12 d-flex">
                <div class="form-check col-5">
                    <label class="form-check-label" for="defaultCheck1">
                        selecciones este campo para constar que no es el propietario
                    </label>
                    <input onchange="checkedConstar(this)" class="form-check-input col-1" type="checkbox" value="" id="constar">
                </div>

                <div id="constar_client" class="input-group-sm mx-5 col-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Observaciones</span>
                    </div>
                    <input name="constar_client" value="{{old('import_company')}}" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.addresses') }}</span>
                    <input id="addresses_client" name="addresses_client" value="{{old('addresses_client')}}" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>

            <div class="input-group-sm mb-3 input-client">
                <label class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Pais de carga</span>
                    <select id="country" class="custom-select" name="country">
                        <option value="0"><b>Seleccion un pais</b></option>
                        @foreach($countries as $key => $country)
                            <option value="{{$key}}"><b>{{$country}}</b></option>
                        @endforeach
                    </select>
                </label>
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.city') }}</span>
                    <input id="city_client" name="city_client" value="{{old('city_client')}}" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.province') }}</span>
                    <input id="province_client" name="province_client" value="{{old('province_client')}}" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.postal_cod') }}</span>
                    <input id="postal_cod_client" name="postal_cod_client" value="{{old('postal_cod_client')}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Forma de pago</span>
                    <select id="selectTransferencia" class="custom-select" onchange="changeType(this)" name="payment_type">
                        {{--<option value="0"><b>Seleccione una opcion</b></option>--}}
                        <option value="Transferencia Bancaria"><b>Transferencia Bancaria</b></option>
                        <option value="Recibo de banco"><b>Recibo de banco</b></option>
                        <option value="otros"><b>otros</b></option>
                    </select>
                </div>
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.price') }}</span>
                    <input id="otrosInput" name="price_order" value="{{old('price_order')}}" type="number" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>

            <div id="create_car">
                <div id="car__0">
                    @include('load-orders.create_car')
                </div>
            </div>
            <br>
            <div id="btnAddCar" class="btn btn-secondary" data-car="0" onclick="addCarForm()">Agregar coche</div>
        </div>

        <div class="tab">

            <h5 class="subtitle-client">{{ __('clients.load_place') }}</h5>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.signing') }}</span>
                    <input name="signing" value="{{old('signing')}}" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.date') }}</span>
                    <input id="dateLoad" name="date_load" value="{{old('date_load')}}" type="date" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.addresses') }}</span>
                    <input name="addresses_load" value="{{old('addresses_load')}}" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.city') }}</span>
                    <input name="city_load" value="{{old('city_load')}}" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.postal_cod') }}</span>
                    <input name="postal_cod_load" value="{{old('postal_cod_load')}}" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.phone') }}</span>
                    <input name="phone_load" value="{{old('phone_load')}}" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.mobile') }}</span>
                    <input name="mobile_load" value="{{old('mobile_load')}}" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.fax') }}</span>
                    <input name="fax" value="{{old('fax')}}" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.contact_person') }}</span>
                    <input name="contact_person" value="{{old('contact_person')}}" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>
        </div>

        <div class="tab">

            <h5 class="subtitle-client">{{ __('clients.download_place') }}</h5>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.addresses') }}</span>
                    <input name="addresses_download" value="{{old('addresses_download')}}" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.city') }}</span>
                    <input name="city_download" value="{{old('city_download')}}" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.postal_cod') }}</span>
                    <input name="postal_cod_download" value="{{old('postal_cod_download')}}" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.contact_person') }}</span>
                    <input name="contact_download" value="{{old('contact_download')}}" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>
            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.mobile') }}</span>
                    <input name="mobile_download" value="{{old('mobile_download')}}" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>

            @if(auth()->id() && false)
                <div class="input-group-sm mb-3 input-client">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.data_driver') }}</span>
                        <input value="{{empty(old('data_driver')) ? ' ' : old('data_driver')}}" name="data_driver" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>

                <div class="input-group-sm mb-3 input-client">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.cmr') }}</span>
                        <input value="{{empty(old('cmr')) ? ' ' : old('cmr')}}" name="cmr" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>
            @endif

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.observations') }}</span>
                    <input name="observations" value="{{old('observations')}}" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
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
                <button class="btn" type="button" id="prevBtn" onclick="nextPrev(-1)"><i class="fas fa-arrow-left"></i></button>
                <button class="btn" type="button" id="nextBtn" onclick="nextPrev(1)"><i class="fas fa-arrow-right"></i></button>
            </div>
        </div>

    </form>
@endsection
@push('js')
    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/clients.js')}}"></script>
    <script>
        $( document ).ready(function() {
            $('#inputDate').datepicker()
                .on('change', function(e) {
                    $('#dateLoad').text($(this).val())
                });
            $('#constar_client').hide();
        });
    </script>
@endpush

