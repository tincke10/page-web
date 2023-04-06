<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
     
    <title>OSTAMMA La Obra Social de Todos - 
    @yield('ubicacion')
    </title>
    
    <!-- Recaptcha -->
    {!! htmlScriptTagJsApi() !!}


    <meta name="description" content="Obra Social de los trabajadores asociados a AMMA">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FACEBOOK TAGS -->
    <meta property="og:title" content="OSTAMMA La Obra Social de Todos" />
    <meta property="og:description" content="Obra Social de los trabajadores asociados a AMMA - Grupo GESTA" />
    <meta property="og:image" content="http://www.ostamma.org.ar/fuentes/facebook.png" />      
    <meta property="og:url" content="http://www.ostamma.org.ar" />

    <meta name="keywords" content="OSTAMMA, Villa María, Obra social, AMMA, Mutual, AMMA SALUD, prestadores médicos, farmacias, clínicas, Córdoba"/>
    
    
    <!-- GOOGLE ANALYTICS -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-172050199-2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date()); 
    gtag('config', 'UA-172050199-2');
    </script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,400&display=swap" rel="stylesheet">
    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="/plantilla/assets/css/style.css">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="/imgs/ostamma.png" type="image/png">
        
    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="/plantilla/assets/css/magnific-popup.css">
        
    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="/plantilla/assets/css/slick.css">
        
    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="/plantilla/assets/css/LineIcons.css">
        
    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="/plantilla/assets/css/bootstrap.min.css">
    
    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="/plantilla/assets/css/default.css">
    
    
</head>

<body >
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
   
    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->
    
    <!--====== NAVBAR TWO PART START ======-->

    <section class="navbar-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                       
                        <a class="navbar-brand" href="/">
                            <img src="/imgs/logo.png" alt="OSTAMMA">
                        </a>
                        
                        <button class="navbar-toggler" type="button" data-togle="collapse" data-target="#navbarTwo" aria-controls="navbarTwo" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarTwo">
                            <ul class="navbar-nav m-auto"> 
                                <li class="nav-item"><a class="page-scroll" href="https://ostamma.org.ar/ostammaapp">OSTAMMA APP</a></li> 
                                <li class="nav-item"><a class="page-scroll" href="/#cartilla">CARTILLA</a></li>
                                <li class="nav-item"><a class="page-scroll" href="/#nosotros">¿QUIÉNES SOMOS?</a></li>
                                <li class="nav-item"><a class="page-scroll" href="/consulta">CONTACTANOS</a></li> 
                                <li class="nav-item"><a class="page-scroll" href="/#contacto">NUESTRAS OFICINAS</a></li>
                            </ul>
                        </div>
                         
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
<!--POP UP DE DESCARGA LA APP OSTAMMA-->
    <section id='contenedor'>
        <div class="window-notice" id="window-notice">
            <div class="content">
                <div class="content-imgs-container">
                    <h2  class="font-weight-bold col-auto btn-primary p-2 text-center "  >Descargá la APP de OSTAMMA</h2>
                    <a href="https://ostamma.org.ar/ostammaapp">
                    <img class="rounded mx-auto d-block"  src="/imgs/popapp.jpeg" alt="app">
                    </a>
                </div>
                <div class="btn btn-outline-primary content-buttons " disabled><a href="javascript:cerrar()" id="close-button">Cerrar</a></div> 
            </div>
        </div>
    </section>
<script> 
function cerrar(){
    document.getElementById("window-notice").style.display="none";
}
</script>
    <!--====== NAVBAR TWO PART ENDS ======-->
    
    @yield('contenido')

   

    <!--====== FOOTER PART ENDS ======-->
    
    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->    

    <!--====== PART START ======-->

<!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-">
                    
                </div>
            </div>
        </div>
    </section>
-->

    <!--====== PART ENDS ======-->



    @yield('scripts')

    <!--====== Jquery js ======-->
    <script src="/plantilla/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/plantilla/assets/js/vendor/modernizr-3.7.1.min.js"></script>
    
    <!--====== Bootstrap js ======-->
    <script src="/plantilla/assets/js/popper.min.js"></script>
    <script src="/plantilla/assets/js/bootstrap.min.js"></script>
    
    <!--====== Slick js ======-->
    <script src="/plantilla/assets/js/slick.min.js"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="/plantilla/assets/js/jquery.magnific-popup.min.js"></script>
    
    <!--====== Ajax Contact js ======-->
    <script src="/plantilla/assets/js/ajax-contact.js"></script>
    
    <!--====== Isotope js ======-->
    <script src="/plantilla/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="/plantilla/assets/js/isotope.pkgd.min.js"></script>
    
    <!--====== Scrolling Nav js ======-->
    <script src="/plantilla/assets/js/jquery.easing.min.js"></script>
    <script src="/plantilla/assets/js/scrolling-nav.js"></script>
    
    <!--====== Main js ======-->
    <script src="/plantilla/assets/js/main.js"></script>
    
</body>

</html>