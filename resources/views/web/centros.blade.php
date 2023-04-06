@extends('layouts.plantilla')


@section('ubicacion')
Centros Médicos
@endsection

@section('contenido')



    
    <section id="formulario" class="contact-area" style='background:#0097CE;'> 
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="section-title text-center pb-30">
                        <h3 class="title">CENTROS MÉDICOS PROPIOS</h3>
                        <p class="text">
                        Los Centros Médicos brindan, excelente cobertura médica que se integran a las atenciones de nuestros PRESTADORES EXTERNOS.
                        <br>
                        Consultá aquí por el Centro Médico Propio más cercano a tu domicilio.

                        .</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-map mt-30">
                    <iframe id="gmap_canvas" src="https://www.google.com/maps/d/embed?mid=1_nToriryyXEK1pRi1jOFwupC5tt4Sdij" width="640" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        
                    </div> <!-- row -->
                </div>
            </div> <!-- row -->
              
        </div> <!-- container -->
    </section>


    <!--====== CONTACT PART ENDS ======-->
    
 
@endsection