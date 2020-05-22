@extends('site.layouts.layouts')
@section('content_site')
    <!-- About Section -->
    <div class="mcv-container description" id="about">
        <span class="items-title">
            <a title="MC Vehículos transporte de vehículos en toda españa" href="{{route('home')}}">
                <img class="img-item" src="{{Storage::disk('s3')->url('images/logoMC.png')}}" alt="Logo de MC Vehículos" width="200" height="98">
            </a>
        </span>
        <div class="mcv-row-padding mcv-center mcv-info">
            <div class="mcv-quarter">
                <h2 class="mcv-large">TRANSPORTE SEGURO</h2>
                <p>
                    Disponemos de un seguro de mercancía de hasta 400 000 €  por camión, para cubrir cualquier forma de perjuicio.
                    Contamos con una flota porta coches que apuesta por los últimos avances tecnológicos.</p>
            </div>
            <div class="mcv-quarter">
                <h2 class="mcv-large">TRATO PERSONALIZADO</h2>
                <p>Ofrecemos un trato personalizado a todos nuestros clientes, así como un servicio íntegro y garantizado,
                    gracias a  nuestro personal experimentado, dedicado durante muchos años a la conducción y transportes de este tipo.</p>
            </div>
            <div class="mcv-quarter">
                <h2 class="mcv-large">NUESTROS CLIENTES</h2>
                <p>Tenemos un amplio abanico de posibilidades en cuanto a cargas se refiere, pues podemos cargar desde el más sencillo vehículo,
                    pasando por motocicletas de todo tipo, así como amplios furgones, micro coches, etc…</p>
            </div>
            <div class="mcv-quarter">
                <h2 class="mcv-large">FLOTA</h2>
                <p>Apuestamos por los últimos avances tecnológicos y una continúa renovación de flota,
                    con la que nuestros clientes pueden estar completamente seguros de la calidad de nuestros servicios.</p>
            </div>
        </div>
    </div>

    <!-- Promo Section - "We know design" -->
    <div class="mcv-container mcv-light-grey description">
        <div class="mcv-row-padding">
            <div class="mcv-col m6">
                <h3>TRANSPORTE DE VEHICULOS - MC</h3>
                <p>Somos especialistas tanto en transporte de vehículos usados como de vehículos nuevos traídos de fábrica,
                    procedentes de países de la UE, con cargas completas o fraccionadas.</p>
                <p>Con servicios de transporte de vehículos tanto a nivel nacional como internacional,
                    brindamos a las empresas la oportunidad de ofrecer a sus clientes el más completo  y esmerado servicio.</p>
            </div>
            <div class="mcv-col m6">
                <img class="mcv-image mcv-round-large" src="{{Storage::disk('s3')->url('images/flota_01.webp')}}" alt="Buildings" width="400" height="394">
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="mcv-container description" id="team">
        <div class="mcv-row-padding">
            <div class="mcv-col m6">
                <img class="mcv-image mcv-round-large" src="{{Storage::disk('s3')->url('images/flota_03.webp')}}" alt="Buildings" width="400" height="394">
            </div>
            <div class="mcv-col m6">
                <h3>Misión</h3>
                <p>Nuestra razón de ser como empresa, en el ámbito de las Instalaciones y Mantenimientos de Climatización,
                    Servicio de Contenedores de Obra y Transporte nacional e internacional de vehículos,</p>
                <p>
                    al que van dirigidos nuestros esfuerzos, es conseguir la total satisfacción de los clientes que confían en nosotros,
                    desde un compromiso de calidad y que satisfaga completamente sus expectativas.</p>
            </div>
        </div>
    </div>

    <!-- Promo Section "Statistics" -->
    <div class="mcv-container mcv-row mcv-center mcv-dark-grey mcv-padding-64">
        <div class="mcv-col">
            <h3>¿SABIAS QUÉ?</h3>
            <p class="sabia-que">
                MC Vehículos - Transcalyguz, bajo el punto de vista estratégico,
                nuestra empresa se encuentra muy bien ubicada en el centro de la península Ibérica, en ciudad Real,
                a menos de 200 km. de Madrid.  </p>
        </div>
    </div>

    <!-- Work Section -->
    <div class="mcv-container description" id="work">
        <h3 class="mcv-center">FLOTA</h3>

        <div class="mcv-row-padding flota">
            <div class="mcv-col l3 m6">
                <img src="{{Storage::disk('s3')->url('images/flota_01.webp')}}" onclick="onClick(this)" class="mcv-hover-opacity img-flota" alt="transporte de vehiculos flota">
            </div>
            <div class="mcv-col l3 m6">
                <img src="{{Storage::disk('s3')->url('images/flota_02.webp')}}" onclick="onClick(this)" class="mcv-hover-opacity img-flota" alt="transporte de vehiculos niñera">
            </div>
            <div class="mcv-col l3 m6">
                <img src="{{Storage::disk('s3')->url('images/flota_03.webp')}}" onclick="onClick(this)" class="mcv-hover-opacity img-flota" alt="transporte de vehiculos mcvehiculos">
            </div>
            <div class="mcv-col l3 m6">
                <img src="{{Storage::disk('s3')->url('images/flota_04.webp')}}" onclick="onClick(this)" class="mcv-hover-opacity img-flota" alt="transporte de vehiculos flota">
            </div>
        </div>

        <div class="mcv-row-padding mcv-section">
            <div class="mcv-col l3 m6">
                <img src="{{Storage::disk('s3')->url('images/flota_05.webp')}}" onclick="onClick(this)" class="mcv-hover-opacity img-flota" alt="transporte de vehiculos flota">
            </div>
            <div class="mcv-col l3 m6">
                <img src="{{Storage::disk('s3')->url('images/flota_06.webp')}}" onclick="onClick(this)" class="mcv-hover-opacity img-flota" alt="transporte de vehiculos niñera">
            </div>
            <div class="mcv-col l3 m6">
                <img src="{{Storage::disk('s3')->url('images/flota_07.webp')}}" onclick="onClick(this)" class="mcv-hover-opacity img-flota" alt="transporte de vehiculos mcvehiculos">
            </div>
            <div class="mcv-col l3 m6">
                <img src="{{Storage::disk('s3')->url('images/flota_08.webp')}}" onclick="onClick(this)" class="mcv-hover-opacity img-flota" alt="transporte de coches">
            </div>
        </div>
    </div>
@stop
@push('js_site')
    <script>
        // Modal Image Gallery
        function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
            var captionText = document.getElementById("caption");
            captionText.innerHTML = element.alt;
        }


        // Toggle between showing and hiding the sidebar when clicking the menu icon
        var mySidebar = document.getElementById("mySidebar");

        function mcv_open() {
            if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
            } else {
                mySidebar.style.display = 'block';
            }
        }

        // Close the sidebar with the close button
        function mcv_close() {
            mySidebar.style.display = "none";
        }
    </script>
@endpush
