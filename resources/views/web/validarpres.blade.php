@extends('layouts.plantilla')

@section('scripts') 
@endsection


@section('ubicacion')
Conocer Plan
@endsection

@section('contenido')
<section id="encabezado" class="contact-area" style='padding:50px!important;background:#003A5D;' > 
</section>
<section id="contenido" class="contact-area" style='background:#FFF;' > 
        <div class="container">
        <div class="row">
            <div class="col-md-4 " > </div>
                <div class="col-md-4 text-center" >
                   <h1>Gestión Prestadores</h1>
                </div>
            <div class="col-md-4"></div>
        </div>
        <div class="col-md-12 text-center">
        <br>
        <form action="https://www.amma.org.ar/web/index.php?p=12" method='POST'> 
        <input type='submit' class="main-btn light-rounded-two" style='COLOR:WHITE;background: #0097CD; border-radius:15px;font-weight:bold;' value= 'VALIDACIÓN DE AFILIADOS' />
        </form>
        <p></p>  
        <div class="container">
        <div class="row" style='background:white;padding:20px;'>
            <div class="col-md-4 pt-30 center"> 
                <center>
                <a href="/archivo/PRESTADORES" rel="noopener noreferrer" download style='color:black;'>
                    <img src="/img/pdf.ico" alt="Descargar Cartilla de Prestadores" style='width:100%;max-width:150px;'>
                    <br> <br>

                    Cartilla de Prestadores
                </a>
                </center>
                <!--<iframe src="http://www.solucionesaludables.com.ar//gproapp/index.jsp?eligioConvenio=false&conv=461&statusLogin=false&menu=prestadores" frameborder="0"
                style='width:100%;height:900px;'>
                </iframe>--> 
            </div>
            <div class="col-md-4 pt-30 center">
                <center>
                <a href="/archivo/VademecumPlanesClasicoySuperior" rel="noopener noreferrer" download style='color:black;'>
                    <img src="/img/pdf.ico" alt="Descargar Vademecum Planes clásico y superior" style='width:100%;max-width:150px;'>
                    <br> <br>

                    Vademecum Planes Clásico y Superior
                </a>
                </center>
            </div>
            <div class="col-md-4 pt-30 center">
                <center>
                <a href="/archivo/VademecumPMO" rel="noopener noreferrer" download style='color:black;'>
                    <img src="/img/pdf.ico" alt="Descargar Vademecum PMO" style='width:100%;max-width:150px;'>
                    <br> <br>

                    Vademecum PMO
                </a>
                </center>
            </div>
            <div class="col-md-4 pt-30 center">
                <center>
                <a href="/archivo/VademecumPMIMADRE" rel="noopener noreferrer" download style='color:black;'>
                    <img src="/img/pdf.ico" alt="Descargar Vademecum PMI MADRE" style='width:100%;max-width:150px;'>
                    <br> <br>

                    Vademecum PMI MADRE
                </a>
                </center>
            </div>
            <div class="col-md-4 pt-30 center">
                <center>
                <a href="/archivo/VademecumPMININO" rel="noopener noreferrer" download style='color:black;'>
                    <img src="/img/pdf.ico" alt="Descargar Vademecum PMI NIÑO" style='width:100%;max-width:150px;'>
                    <br> <br>

                    Vademecum PMI NIÑO
                </a>
                </center>
            </div>

            <div class="col-md-4 pt-30 center">
                <center>
                <a href="/archivo/Planilla_Resumen" rel="noopener noreferrer" download style='color:black;'>
                    <img src="/img/pdf.ico" alt="Descargar Planilla Resumen" style='width:100%;max-width:150px;'>
                    <br> <br> 
                    Planilla Resumen 
                </a>
                </center>
            </div>
            <div class="col-md-4 pt-30 center">
                <center>
                <a href="/archivo/Planilla_Facturacion_Farmacia_PMO" rel="noopener noreferrer" download style='color:black;'>
                    <img src="/img/pdf.ico" alt="Descargar Planilla Facturacion Farmacia PMO" style='width:100%;max-width:150px;'>
                    <br> <br>

                    Planilla Facturacion Farmacia PMO 
                </a>
                </center>
            </div>
            <div class="col-md-4 pt-30 center">
                <center>
                <a href="/archivo/Planilla_Facturacion_Farmacia_PlanClasico" rel="noopener noreferrer" download style='color:black;'>
                    <img src="/img/pdf.ico" alt="Descargar Planilla Facturacion Farmacia Plan Clasico" style='width:100%;max-width:150px;'>
                    <br> <br>

                    Planilla Facturación Farmacia Plan Clasico
                </a>
                </center>
            </div>
            <div class="col-md-4 pt-30 center">
                <center>
                <a href="/archivo/Planilla_Facturacion_Farmacia_PlanSuperior" rel="noopener noreferrer" download style='color:black;'>
                    <img src="/img/pdf.ico" alt="Descargar Planilla Facturacion Farmacia Plan Superior" style='width:100%;max-width:150px;'>
                    <br> <br>

                    Planilla Facturación Farmacia Plan Superior
                </a>
                </center>
            </div>
        </div>
 
        </div>
 
        	 

        
        
        
        </div>
        </div>
</section>

 
@endsection