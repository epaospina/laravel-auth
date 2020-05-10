@extends('site.layouts')
@section('content_site')
    <!-- About Section -->
    <div class="mcv-container" style="padding:128px 16px" id="about">
        <span style="font-family: georgia, palatino; font-size: 14pt;"><a style="color: rgb(85, 85, 85); text-decoration-line: none;" title="MC Vehículos - Transporte de Vehículos - Transcalyguz - Ciudad Real" href="{{route('home')}}"><img style="display: block; margin-left: auto; margin-right: auto;" src="{{asset('images/logoMC.png')}}" alt="Logo de MC Vehículos" width="200" height="98"></a></span>
        <div class="mcv-row-padding mcv-center" style="margin-top:64px">
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
    <div class="mcv-container mcv-light-grey" style="padding:128px 16px">
        <div class="mcv-row-padding">
            <div class="mcv-col m6">
                <h3>TRANSPORTE DE VEHICULOS - MC</h3>
                <p>Somos especialistas tanto en transporte de vehículos usados como de vehículos nuevos traídos de fábrica,
                    procedentes de países de la UE, con cargas completas o fraccionadas.</p>
                <p>Con servicios de transporte de vehículos tanto a nivel nacional como internacional,
                    brindamos a las empresas la oportunidad de ofrecer a sus clientes el más completo  y esmerado servicio.</p>
            </div>
            <div class="mcv-col m6">
                <img class="mcv-image mcv-round-large" src="{{asset('images/home/flota_01.webp')}}" alt="Buildings" width="400" height="394">
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="mcv-container" style="padding:128px 16px" id="team">
        <div class="mcv-row-padding">
            <div class="mcv-col m6">
                <img class="mcv-image mcv-round-large" src="{{asset('images/home/flota_03.webp')}}" alt="Buildings" width="400" height="394">
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
            <p style="display: block; padding: 10px 20%;">
                MC Vehículos - Transcalyguz, bajo el punto de vista estratégico,
                nuestra empresa se encuentra muy bien ubicada en el centro de la península Ibérica, en ciudad Real,
                a menos de 200 km. de Madrid.  </p>
        </div>
    </div>

    <!-- Work Section -->
    <div class="mcv-container" style="padding:128px 16px" id="work">
        <h3 class="mcv-center">FLOTA</h3>

        <div class="mcv-row-padding" style="margin-top:64px">
            <div class="mcv-col l3 m6">
                <img src="{{asset('images/home/flota_01.webp')}}" style="width:100%" onclick="onClick(this)" class="mcv-hover-opacity" alt="transporte de vehiculos flota">
            </div>
            <div class="mcv-col l3 m6">
                <img src="{{asset('images/home/flota_02.webp')}}" style="width:100%" onclick="onClick(this)" class="mcv-hover-opacity" alt="transporte de vehiculos niñera">
            </div>
            <div class="mcv-col l3 m6">
                <img src="{{asset('images/home/flota_03.webp')}}" style="width:100%" onclick="onClick(this)" class="mcv-hover-opacity" alt="transporte de vehiculos mcvehiculos">
            </div>
            <div class="mcv-col l3 m6">
                <img src="{{asset('images/home/flota_04.webp')}}" style="width:100%" onclick="onClick(this)" class="mcv-hover-opacity" alt="transporte de vehiculos flota">
            </div>
        </div>

        <div class="mcv-row-padding mcv-section">
            <div class="mcv-col l3 m6">
                <img src="{{asset('images/home/flota_05.webp')}}" style="width:100%" onclick="onClick(this)" class="mcv-hover-opacity" alt="transporte de vehiculos flota">
            </div>
            <div class="mcv-col l3 m6">
                <img src="{{asset('images/home/flota_06.webp')}}" style="width:100%" onclick="onClick(this)" class="mcv-hover-opacity" alt="transporte de vehiculos niñera">
            </div>
            <div class="mcv-col l3 m6">
                <img src="{{asset('images/home/flota_07.webp')}}" style="width:100%" onclick="onClick(this)" class="mcv-hover-opacity" alt="transporte de vehiculos mcvehiculos">
            </div>
            <div class="mcv-col l3 m6">
                <img src="{{asset('images/home/flota_08.webp')}}" style="width:100%" onclick="onClick(this)" class="mcv-hover-opacity" alt="transporte de coches">
            </div>
        </div>
    </div>

    <!-- Modal for full size images on click-->
    <div id="modal01" class="mcv-modal mcv-black" onclick="this.style.display='none'">
        <span class="mcv-button mcv-xxlarge mcv-black mcv-padding-large mcv-display-topright" title="Close Modal Image">×</span>
        <div class="mcv-modal-content mcv-animate-zoom mcv-center mcv-transparent mcv-padding-64">
            <img id="img01" class="mcv-image">
            <p id="caption" class="mcv-opacity mcv-large"></p>
        </div>
    </div>

    <!-- Skills Section -->
    <div class="mcv-container mcv-dark-grey mcv-padding-64">
        <div class="mcv-row-padding">
            <div class="mcv-col m6">
                <h3>DATOS DE CONTACTO</h3>
                <p><i class="fa fa-phone fa-fw mcv-xxlarge mcv-margin-right"></i> Phone: +34 926 22 84 53</p>
                <p><i class="fa fa-phone fa-fw mcv-xxlarge mcv-margin-right"></i> Phone: +34 926 25 59 63</p>
                <p><i class="fa fa-phone fa-fw mcv-xxlarge mcv-margin-right"></i> Phone: +34 629 42 31 79.</p>
            </div>
            <div class="mcv-col m6">
                <p><i class="fa fa-map-marker fa-fw mcv-xxlarge mcv-margin-right"></i>
                    Calle Altagracia, 8 - CP 13003 - Ciudad Real<br>
                    Castilla La Mancha - Spain</p>
                <p><i class="fa fa-envelope fa-fw mcv-xxlarge mcv-margin-right"> </i>
                    mcvehiculos1935@msn.com
                    centroclimagd@msn.com
                </p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mcv-center mcv-black mcv-padding-64">
        <a href="#home" class="mcv-button mcv-light-grey"><i class="fa fa-arrow-up mcv-margin-right"></i>Inicio</a>
    </footer>
@stop

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
