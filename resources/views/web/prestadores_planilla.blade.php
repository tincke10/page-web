@extends('layouts.plantilla')

@section('scripts') 
<style>
.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, .5);
    display: table;
    transition: opacity .3s ease;
  }
  
  .modal-wrapper {
    display: table-cell;
    vertical-align: middle;
  }
  
  .modal-container {
    width: 300px;
    margin: 0px auto;
    padding: 20px 30px;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
    transition: all .3s ease;
    font-family: Helvetica, Arial, sans-serif;
  }
  
  .modal-header h3 {
    margin-top: 0;
    color: #42b983;
  }
  
  .modal-body {
    margin: 20px 0;
  }
  
  .modal-default-button {
    float: right;
  }
   
  
  .modal-enter {
    opacity: 0;
  }
  
  .modal-leave-active {
    opacity: 0;
  }
  </style>

@endsection


@section('ubicacion')
Prestadores
@endsection

@section('contenido')
<div id="apimodal">
<section id="encabezado" class="contact-area" style='padding:50px!important;background:#0097CE;' > 
</section>
<section id="contenido" class="contact-area" style='background:#FFF;' > 
        <div class="container">
        <div class="row">
            <div class="col-md-4 " > </div>
                <div class="col-md-4 text-center" >
                   <h1>Consulte los prestadores</h1>
                </div>
            <div class="col-md-4"></div>
        </div>
        <div class="col-md-12">
   
        <div class="container">
        <div class="row" style='background:white;padding:20px;'>
            <div class="col-md-3 pt-10 center">
            </div>
            <div class="col-md-2 pt-10 center">
            <br>
            <center>
            <a href="/archivo/prestadoresplanilla" rel="noopener noreferrer" download style='color:black;'>
                <img src="/img/pdf.ico" alt="Descargar Cartilla de Prestadores" style='width:100%;max-width:75px;'>
            </div>
            <div class="col-md-4 pt-8 center">    <br> <br>

               Descargar Cartilla Prestadores
            </a>
            </center> 
            <br>
            </div>
            <div class="col-md-3 pt-10 center">
            </div>
            </div>
 
        </div>
 
        	 

        
        
        
        </div>
        </div>
</section>
</div>
 
@endsection