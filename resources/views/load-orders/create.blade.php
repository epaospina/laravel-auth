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
    {{--<button id="upload-button">Select PDF</button>
    <input type="file" id="file-to-upload" accept="application/pdf" />
    <div id="pdf-main-container">
        <div id="pdf-loader">Loading document ...</div>
        <div id="pdf-contents">
            <div id="pdf-meta">
                <div id="pdf-buttons">
                    <button id="pdf-prev">Previous</button>
                    <button id="pdf-next">Next</button>
                </div>
                <div id="page-count-container">Page <div id="pdf-current-page"></div> of <div id="pdf-total-pages"></div></div>
            </div>
            <canvas id="pdf-canvas" width="400"></canvas>
            <div id="page-loader">Loading page ...</div>
            <a id="download-image" href="#">Download PNG</a>
        </div>
    </div>
    <img id="imgTest" src="{{asset('/pdf/page.png')}}" alt="">--}}
    <form id="regForm" action="{{ route('load-orders.store') }}" method="POST">
        @csrf
        <div class="tab border p-4">
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
                <input id="import_company" name="import_company" value="{{old('import_company')}}" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
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
                <label class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Pais de carga</span>
                    <select id="country" class="custom-select" name="country">
                        @foreach($countries as $key => $country)
                            <option value="{{$key}}"><b>{{$country}}</b></option>
                        @endforeach
                    </select>
                </label>
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
                <label class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Pais de descarga</span>
                    <select id="country_download" class="custom-select" name="country_download">
                        @foreach($countries as $key => $country)
                            <option value="{{$key}}"><b>{{$country}}</b></option>
                        @endforeach
                    </select>
                </label>
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.city') }}</span>
                    <input name="city_download" value="{{old('city_download')}}" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>

            <div class="input-group-sm mb-3 input-client">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('clients.addresses') }}</span>
                    <input name="addresses_download" value="{{old('addresses_download')}}" type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
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
                <button class="btn btn-primary" type="button" id="prevBtn" onclick="nextPrev(-1)"><i class="fas fa-arrow-left"></i></button>
                <button class="btn btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)"><i class="fas fa-arrow-right"></i></button>
            </div>
        </div>

    </form>
@endsection
@push('js')
    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/pdf.js')}}"></script>
    <script src="{{asset('js/pdf.worker.js')}}"></script>
    <script src="{{asset('js/ocrad.js')}}"></script>
    <script src="{{asset('js/clients.js')}}"></script>
    <script>
        $( document ).ready(function() {
            $('.pace').remove();
            $('#inputDate').datepicker()
                .on('change', function(e) {
                    $('#dateLoad').text($(this).val())
                });
            $('#constar_client').hide();
            console.log(OCRAD(document.getElementById('imgTest')))

            var __PDF_DOC,
                __CURRENT_PAGE,
                __TOTAL_PAGES,
                __PAGE_RENDERING_IN_PROGRESS = 0,
                __CANVAS = $('#pdf-canvas').get(0),
                __CANVAS_CTX = __CANVAS.getContext('2d');

            function showPDF(pdf_url) {
                $("#pdf-loader").show();

                PDFJS.getDocument({ url: pdf_url }).then(function(pdf_doc) {
                    __PDF_DOC = pdf_doc;
                    __TOTAL_PAGES = __PDF_DOC.numPages;

                    // Hide the pdf loader and show pdf container in HTML
                    $("#pdf-loader").hide();
                    $("#pdf-contents").show();
                    $("#pdf-total-pages").text(__TOTAL_PAGES);

                    // Show the first page
                    showPage(1);
                }).catch(function(error) {
                    // If error re-show the upload button
                    $("#pdf-loader").hide();
                    $("#upload-button").show();

                    alert(error.message);
                });;
            }

            function showPage(page_no) {
                __PAGE_RENDERING_IN_PROGRESS = 1;
                __CURRENT_PAGE = page_no;

                // Disable Prev & Next buttons while page is being loaded
                $("#pdf-next, #pdf-prev").attr('disabled', 'disabled');

                // While page is being rendered hide the canvas and show a loading message
                $("#pdf-canvas").hide();
                $("#page-loader").show();
                $("#download-image").hide();

                // Update current page in HTML
                $("#pdf-current-page").text(page_no);

                // Fetch the page
                __PDF_DOC.getPage(page_no).then(function(page) {
                    // As the canvas is of a fixed width we need to set the scale of the viewport accordingly
                    var scale_required = __CANVAS.width / page.getViewport(1).width;

                    // Get viewport of the page at required scale
                    var viewport = page.getViewport(scale_required);

                    // Set canvas height
                    __CANVAS.height = viewport.height;

                    var renderContext = {
                        canvasContext: __CANVAS_CTX,
                        viewport: viewport
                    };

                    // Render the page contents in the canvas
                    page.render(renderContext).then(function() {
                        __PAGE_RENDERING_IN_PROGRESS = 0;

                        // Re-enable Prev & Next buttons
                        $("#pdf-next, #pdf-prev").removeAttr('disabled');

                        // Show the canvas and hide the page loader
                        $("#pdf-canvas").show();
                        $("#page-loader").hide();
                        $("#download-image").show();
                    });
                });
            }

// Upon click this should should trigger click on the #file-to-upload file input element
// This is better than showing the not-good-looking file input element
            $("#upload-button").on('click', function() {
                $("#file-to-upload").trigger('click');
            });

// When user chooses a PDF file
            $("#file-to-upload").on('change', function() {
                // Validate whether PDF
                if(['application/pdf'].indexOf($("#file-to-upload").get(0).files[0].type) == -1) {
                    alert('Error : Not a PDF');
                    return;
                }

                $("#upload-button").hide();

                // Send the object url of the pdf
                showPDF(URL.createObjectURL($("#file-to-upload").get(0).files[0]));
            });

// Previous page of the PDF
            $("#pdf-prev").on('click', function() {
                if(__CURRENT_PAGE != 1)
                    showPage(--__CURRENT_PAGE);
            });

// Next page of the PDF
            $("#pdf-next").on('click', function() {
                if(__CURRENT_PAGE != __TOTAL_PAGES)
                    showPage(++__CURRENT_PAGE);
            });

// Download button
            $("#download-image").on('click', function() {
                $(this).attr('href', __CANVAS.toDataURL()).attr('download', 'page.png');
            });
        });
    </script>

@endpush

