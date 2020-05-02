<!DOCTYPE html>
<html>
<title>Transporte de vehículos</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

    body, html {
        height: 100%;
        line-height: 1.8;
    }

    /* Full height image header */
    .bgimg-1 {
        background-position: center;
        background-size: cover;
        background-image: url("../images/home/mcvehiculos_01.jpg");
        min-height: 100%;
    }

    .w3-bar .w3-button {
        padding: 16px;
    }
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
    <div class="w3-bar w3-white w3-card" id="myNavbar">
        <a href="#home" class="w3-bar-item w3-button"><b>MC</b> Vehículos</a>
        <!-- Right-sided navbar links -->
        <div class="w3-right w3-hide-small">
            <a href="#about" class="w3-bar-item w3-button"> NOSOTROS</a>
            <a href="#work" class="w3-bar-item w3-button"><i class="fa fa-th"></i> FLOTAS</a>
            <a href="#contact" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> CONTACTANOS</a>
        </div>
        <!-- Hide right-floated links on small screens and replace them with a menu icon -->

        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">NOSOTROS</a>
    <a href="#work" onclick="w3_close()" class="w3-bar-item w3-button">FLOTA</a>
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACTANOS</a>
</nav>

<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
    <div class="w3-display-left w3-text-white" style="padding:48px">
        <span class="w3-large">Transporte de vehículos</span>
        <p><a href="#contact" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">CONTACTANOS</a></p>
    </div>
    <div class="w3-display-bottomleft w3-text-grey w3-large" style="padding:24px 48px">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
    </div>
</header>

<!-- About Section -->
<div class="w3-container" style="padding:128px 16px" id="about">
    <span style="font-family: georgia, palatino; font-size: 14pt;"><a style="color: rgb(85, 85, 85); text-decoration-line: none;" title="MC Vehículos - Transporte de Vehículos - Transcalyguz - Ciudad Real" href="{{route('home')}}"><img style="display: block; margin-left: auto; margin-right: auto;" src="{{asset('images/logoMC.png')}}" alt="Logo de MC Vehículos" width="200" height="98"></a></span>
    <div class="w3-row-padding w3-center" style="margin-top:64px">
        <div class="w3-quarter">
            <p class="w3-large">TRANSPORTE SEGURO</p>
            <p>
            Disponemos de un seguro de mercancía de hasta 400 000 €  por camión, para cubrir cualquier forma de perjuicio.
            Nuestra flota de porta coches apuesta por los últimos avances tecnológicos.</p>
        </div>
        <div class="w3-quarter">
            <p class="w3-large">TRATO PERSONALIZADO</p>
            <p>Ofrecemos un trato personalizado a todos nuestros clientes, así como un servicio íntegro y garantizado,
            gracias a  nuestro personal experimentado, dedicado durante muchos años a la conducción y transportes de este tipo.</p>
        </div>
        <div class="w3-quarter">
            <p class="w3-large">NUESTROS CLIENTES</p>
            <p>Tenemos un amplio abanico de posibilidades en cuanto a cargas se refiere, pues podemos cargar desde el más sencillo vehículo,
                pasando por motocicletas de todo tipo, así como amplios furgones, micro coches, etc…</p>
        </div>
        <div class="w3-quarter">
            <p class="w3-large">NUESTRA FLOTA</p>
            <p>Nuestra flota de porta coches  apuesta por los últimos avances tecnológicos y una continúa renovación de flota,
                con la que nuestros clientes pueden estar completamente seguros de la calidad de nuestros servicios.</p>
        </div>
    </div>
</div>

<!-- Promo Section - "We know design" -->
<div class="w3-container w3-light-grey" style="padding:128px 16px">
    <div class="w3-row-padding">
        <div class="w3-col m6">
            <h3>TRANSPORTE DE VEHICULOS - MC</h3>
            <p>MC Transporte de Vehículos – Transcalyguz, s.l.,
                somos especialistas tanto en transporte de vehículos usados como de vehículos nuevos traídos de fábrica,
                procedentes de países de la UE, con cargas completas o fraccionadas.</p>
            <p>Con nuestros servicios de transporte de vehículos tanto a nivel nacional como internacional,
                brindamos a las empresas la oportunidad de ofrecer a sus clientes el más completo  y esmerado servicio.</p>
        </div>
        <div class="w3-col m6">
            <img class="w3-image w3-round-large" src="{{asset('images/home/flota_01.jpeg')}}" alt="Buildings" width="400" height="394">
        </div>
    </div>
</div>

<!-- Team Section -->
<div class="w3-container" style="padding:128px 16px" id="team">
    <div class="w3-row-padding">
        <div class="w3-col m6">
            <img class="w3-image w3-round-large" src="{{asset('images/home/flota_03.jpeg')}}" alt="Buildings" width="400" height="394">
        </div>
        <div class="w3-col m6">
            <h3>Nuestra Misión</h3>
            <p>Nuestra razón de ser como empresa, en el ámbito de las Instalaciones y Mantenimientos de Climatización,
                Servicio de Contenedores de Obra y Transporte nacional e internacional de vehículos,</p>
            <p>
                al que van dirigidos nuestros esfuerzos, es conseguir la total satisfacción de los clientes que confían en nosotros,
                desde un compromiso de calidad y que satisfaga completamente sus expectativas.</p>
        </div>
    </div>
</div>

<!-- Promo Section "Statistics" -->
<div class="w3-container w3-row w3-center w3-dark-grey w3-padding-64">
    <div class="w3-col">
        <h3>¿SABIAS QUÉ?</h3>
        <p style="display: block; padding: 10px 20%;">
            MC Vehículos - Transcalyguz, bajo el punto de vista estratégico,
            nuestra empresa se encuentra muy bien ubicada en el centro de la península Ibérica, en ciudad Real,
            a menos de 200 km. de Madrid.  </p>
    </div>
</div>

<!-- Work Section -->
<div class="w3-container" style="padding:128px 16px" id="work">
    <h3 class="w3-center">NUESTRA FLOTA</h3>

    <div class="w3-row-padding" style="margin-top:64px">
        <div class="w3-col l3 m6">
            <img src="{{asset('images/home/flota_01.jpeg')}}" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A microphone">
        </div>
        <div class="w3-col l3 m6">
            <img src="{{asset('images/home/flota_02.jpeg')}}" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A phone">
        </div>
        <div class="w3-col l3 m6">
            <img src="{{asset('images/home/flota_03.jpeg')}}" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A drone">
        </div>
        <div class="w3-col l3 m6">
            <img src="{{asset('images/home/flota_04.jpeg')}}" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Soundbox">
        </div>
    </div>

    <div class="w3-row-padding w3-section">
        <div class="w3-col l3 m6">
            <img src="{{asset('images/home/flota_05.jpeg')}}" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A tablet">
        </div>
        <div class="w3-col l3 m6">
            <img src="{{asset('images/home/flota_06.jpeg')}}" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A camera">
        </div>
        <div class="w3-col l3 m6">
            <img src="{{asset('images/home/flota_07.jpeg')}}" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A typewriter">
        </div>
        <div class="w3-col l3 m6">
            <img src="{{asset('images/home/flota_08.jpeg')}}" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A tableturner">
        </div>
    </div>
</div>

<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
    <span class="w3-button w3-xxlarge w3-black w3-padding-large w3-display-topright" title="Close Modal Image">×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
        <img id="img01" class="w3-image">
        <p id="caption" class="w3-opacity w3-large"></p>
    </div>
</div>

<!-- Skills Section -->
<div class="w3-container w3-dark-grey w3-padding-64">
    <div class="w3-row-padding">
        <div class="w3-col m6">
            <h3>DATOS DE CONTACTO</h3>
            <p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i> Phone: +34 926 22 84 53</p>
            <p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i> Phone: +34 926 25 59 63</p>
            <p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i> Phone: +34 629 42 31 79.</p>
        </div>
        <div class="w3-col m6">
            <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right"></i>
                Calle Altagracia, 8 - CP 13003 - Ciudad Real<br>
                Castilla La Mancha - Spain</p>
            <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i>
                mcvehiculos1935@msn.com
                centroclimagd@msn.com
            </p>
        </div>
    </div>
</div>

<!-- Contact Section -->
<div class="w3-container w3-light-grey" style="padding:128px 16px" id="contact">
    <h3 class="w3-center">CONTACTANOS</h3>
    <div style="margin-top:10px">
        <br>
        <form action="/action_page.php" target="_blank">
            <p><input class="w3-input w3-border" type="text" placeholder="Name" required name="Name"></p>
            <p><input class="w3-input w3-border" type="text" placeholder="Email" required name="Email"></p>
            <p><input class="w3-input w3-border" type="text" placeholder="Subject" required name="Subject"></p>
            <p><input class="w3-input w3-border" type="text" placeholder="Message" required name="Message"></p>
            <p>
                <button class="w3-button w3-black" type="submit">
                    <i class="fa fa-paper-plane"></i>Enviar
                </button>
            </p>
        </form>
    </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
    <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
    <div class="w3-xlarge w3-section">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
    </div>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

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

    function w3_open() {
        if (mySidebar.style.display === 'block') {
            mySidebar.style.display = 'none';
        } else {
            mySidebar.style.display = 'block';
        }
    }

    // Close the sidebar with the close button
    function w3_close() {
        mySidebar.style.display = "none";
    }
</script>

</body>
</html>
