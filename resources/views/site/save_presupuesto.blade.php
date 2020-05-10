<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#339900"/>
    <link rel="canonical" href="https://mcvehiculos.com">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('mcv.ico')}}">
    <link rel="stylesheet" href="{{asset('css/home/style.css')}}">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .bg {
            /* The image used */
            background-image: url({{asset("/images/home/mcvehiculos_01.webp")}});

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .content-site{
            position: absolute;
            padding: 0 20vw;
            color: white;
            display: flex;
            flex-flow: column;
        }
        .content-site h1{
            font-weight: normal;
            text-align: center;
        }
        .button {
            background-color: #026c48b0;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 5% 30%;
            cursor: pointer;
            border-radius: 17px;
        }
    </style>
</head>
<body>
    <div class="bg">
        <div class="content-site">
            <h1>Gracias por confiar en nosotros. pronto nos pondemos en contacto con tigo para evaluar tus requerimientos</h1>
            <a href="/" class="button">Regresar al incio</a>
        </div>
    </div>
</body>
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
