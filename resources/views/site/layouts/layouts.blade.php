<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Transporte de vehículos en España | MCvehiculos</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="mcvehiculos">
    <meta name="google-site-verification" content="5EVbZ67ex5x_fHNM4Vm-_U_vd3O2dD1tMtS7NgoInmo">
    <meta name="description" content="ofrecemos transportes de vehículos al mejor precio para toda España. Especialistas en vehículos usados y nuevos. !entra y pide tu presupuesto¡">
    {{-- open graph --}}
    <meta property="og:title" content="Transporte de vehículos en España">
    <meta property="og:site_name" content="MC Vehículos">
    <meta property="og:url" content="https://mcvehiculos.com">
    <meta property="og:description" content="ofrecemos transportes de vehículos al mejor precio para toda España">
    <meta property="og:type" content="business.business">
    <meta property="og:image" content="https://mcvehiculos.com/images/home/flota_01.webp">
    {{-- close --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#339900"/>
    <link rel="canonical" href="https://mcvehiculos.com">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('mcv.ico')}}">
    <link rel="stylesheet" href="{{asset('css/home/style.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PPFGXXW');</script>
    <!-- End Google Tag Manager -->
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
            background-image: url({{asset("/images/home/mcvehiculos_01.webp")}});
            min-height: 100%;
        }

        .mcv-bar .mcv-button {
            padding: 16px;
        }
        @stack('css_site')
    </style>

    <!-- Marcado JSON-LD generado por el Asistente para el marcado de datos estructurados de Google. -->
    <script type="application/ld+json">
        {
          "@context" : "http://schema.org",
          "@type" : "LocalBusiness",
          "name" : "MCVEHICULOS - Transporte de vehículos",
          "image" : "https://mcvehiculos.com/images/home/flota_01.webp",
          "telephone" : "+34 926 22 84 53",
          "email" : "",
          "address" : {
            "@type" : "PostalAddress",
            "streetAddress" : "Calle Altagracia, 8",
            "addressRegion" : "Ciudad Real",
            "addressCountry" : "Spain",
            "postalCode" : "13003"
          }
        }
    </script>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PPFGXXW"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="mcv-top">
        <div class="mcv-bar mcv-white mcv-card" id="myNavbar">
            <a href="#home" class="mcv-bar-item mcv-button"><b>MC</b> Vehículos</a>
            <div class="mcv-right mcv-hide-small">
                <a href="#about" class="mcv-bar-item mcv-button"> NOSOTROS</a>
                <a href="#work" class="mcv-bar-item mcv-button"><img class="svg-img" src="{{asset('svg/th-solid.svg')}}" alt="transporte de vehiculos th"> FLOTAS</a>
                <a href="#contact" class="mcv-bar-item mcv-button"><img class="svg-img" src="{{asset('svg/envelope-solid.svg')}}" alt="transporte de vehiculos fa-envelope">CONTACTANOS</a>
            </div>
            <a class="mcv-bar-item mcv-button mcv-right mcv-hide-large mcv-hide-medium" onclick="mcv_open()">
                <img class="svg-img" src="{{asset('svg/bars-solid.svg')}}" alt="transporte de vehiculos fa-envelope">
            </a>
        </div>
    </div>

    <nav class="mcv-sidebar mcv-bar-block mcv-black mcv-card mcv-animate-left mcv-hide-medium mcv-hide-large" style="display:none" id="mySidebar">
        <a onclick="mcv_close()" class="mcv-bar-item mcv-button mcv-large mcv-padding-16">Close ×</a>
        <a href="#about" onclick="mcv_close()" class="mcv-bar-item mcv-button">NOSOTROS</a>
        <a href="#work" onclick="mcv_close()" class="mcv-bar-item mcv-button">FLOTA</a>
        <a href="#contact" onclick="mcv_close()" class="mcv-bar-item mcv-button">CONTACTANOS</a>
    </nav>
    <header class="bgimg-1 mcv-display-container mcv-grayscale-min" id="home">
        <div class="mcv-row-padding">
            <div class="mcv-col m5 mcv-title">
                <h1 itemprop="name">Transporte de vehículos por carretera seguro y personalizado</h1>
            </div>
            <div class="mcv-col m6 presupuesto">
                <form method="post" action="{{route('presupuesto')}}">
                    <p class="text-center">Calcule su presupuesto</p>
                    <div class="mcv-col m6">
                        <div class="item-presupuesto">
                            <label for="tipo_vehiculo">Tipo de vehiculo:</label>
                            <input class="mcv-input mcv-border" placeholder="Tipo de vehiculo" required type="text" name="tipo_vehiculo" id="tipo_vehiculo">
                        </div>
                        <div class="item-presupuesto">
                            <label for="modelo">Modelo:</label>
                            <input class="mcv-input mcv-border" placeholder="Modelo" required type="text" name="modelo" id="modelo">
                        </div>
                    </div>
                    <div class="mcv-col m6">
                        <div class="item-presupuesto">
                            <label for="telefono">Telefono:</label>
                            <input class="mcv-input mcv-border" placeholder="Telefono" required type="text" name="telefono" id="telefono">
                        </div>
                        <div class="item-presupuesto">
                            <label for="email">Email:</label>
                            <input class="mcv-input mcv-border" placeholder="Email" required type="text" name="email" id="email">
                        </div>
                    </div>
                    <div class="mcv-col m6">
                        <div class="item-presupuesto">
                            <label for="desde">Desde:</label>
                            <input class="mcv-input mcv-border" placeholder="Desde" required type="text" name="desde" id="desde">
                        </div>
                    </div>
                    <div class="mcv-col m6">
                        <div class="item-presupuesto">
                            <label for="hasta">Hasta:</label>
                            <input class="mcv-input mcv-border" placeholder="Hasta" required type="text" name="hasta" id="hasta">
                        </div>
                    </div>
                    <p style="padding: 0 20%;">
                        He leído, entiendo y acepto la cláusula de protección de datos.
                    </p>
                    <p class="text-center">
                        <button class="mcv-button mcv-btn" type="submit">
                            <img class="svg-img" src="{{asset('svg/paper-plane-solid.svg')}}" alt="transporte de vehiculos fa-envelope">Enviar Presupuesto
                        </button>
                    </p>
                </form>
            </div>
        </div>
    </header>
    <div id="app">
        <main class="mcv-containe">
            @yield('content_site')
        </main>
    </div>
</body>
</html>
