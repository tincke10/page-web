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

        <section id="formulario" class="contact-area mt-30 pt-0 pb-20" style='border-bottom:2px solid black; padding:20px;border-radius:4px;'>
        <form action="" method="get">
        <div class="containter ">
            <div class="row  "> 
                    <div class="col-md-3">
                        <div class="form-input mt-25">
                         <label>Plan</label>
                            <div class="select-items select input-items default">
                                <SELECT   style='width: 100%;
                                height: 44px;
                                border: 2px solid gray;
                                padding-left: 12px;
                                padding-right: 12px;
                                border-radius:5px;
                                position: relative;
                                font-size: 16px;   color: #6c6c6c;' id='plan' name='plan' data-old="{{old('plan')}}"> 
                                <option value="0" >
                                TODOS
                                </option>
                                @foreach($planes as $p)
                                    <option value="{{$p->id}}" style='text-transform: uppercase!important;'
                                        @if ($p->id==$plan)
                                        selected
                                        @endif 
                                        >
                                    {{$p->nombre}}
                                    </option>
                                @endforeach
                                </SELECT>
                                <i class="lni lni-card"></i>
                            </div>
                        </div> <!-- form input -->
                    </div> 
                    <div class="col-md-3">
                        <div class="form-input mt-25">
                         <label>Localidad</label>
                            <div class="select-items select input-items default">
                                <SELECT   style='width: 100%;
                                height: 44px;
                                border: 2px solid gray;
                                padding-left: 12px;
                                padding-right: 12px;
                                border-radius:5px;
                                position: relative;
                                font-size: 16px;   color: #6c6c6c;' id='localidad' name='localidad' data-old="{{old('localidad',$localidad)}}"> 
                                <option value="0" >
                                    TODAS
                                </option>
                                @foreach($localidades as $loca)
                                    <option value="{{$loca->id}}" 
                                        @if ($loca->id==$localidad)
                                        selected
                                        @endif
                                        >
                                    {{$loca->nombre}}
                                    </option>
                                @endforeach
                                </SELECT>
                                <i class="lni lni-card"></i>
                            </div>
                        </div> <!-- form input -->
                    </div> 
                    <div class="col-md-3">
                        <div class="form-input mt-25">
                         <label>Especialidad</label>
                            <div class="select-items select input-items default">
                                <SELECT   style='width: 100%;
                                height: 44px;
                                border: 2px solid gray;
                                padding-left: 12px;
                                padding-right: 12px;
                                border-radius:5px;
                                position: relative;
                                font-size: 16px;   color: #6c6c6c;' id='especialidad' name='especialidad' data-old="{{old('especialidad')}}" disabled> 
                                <option value="0" >
                                    TODAS
                                </option>
                                @foreach($especialidades as $esp)
                                    <option value="{{$esp->id}}" 
                                        @if ($esp->id==$especialidad)
                                        selected
                                        @endif
                                        >
                                    {{$esp->nombre}}
                                    </option>
                                @endforeach
                                </SELECT>
                                <i class="lni lni-card"></i>
                            </div>
                        </div> <!-- form input -->
                    </div> 
                    <div class="col-md-3">
                        <div class="form-input light-rounded-buttons mt-50">
                            
                        <input type='submit' class="main-btn light-rounded-two border-0 mt-1" value= 'Buscar' style='box-shadow:0px 0px 3px #111;line-height:43px;width:100%;' />
                        </div>
                    </div> 

            </div>
            
        </div>
        </form>

        <div class="containter mt-20" STYLE='background:white;'>
                                            
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Localidad</th>
                    <th scope="col">Dirección</th> 
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                

            
            @foreach ($establecimientos_seleccionados as $est)


            
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$est->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$est->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{$est->nombre}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="containter">
                <div class="row">
                    <div class="col-md-5 text-right" >
                        Localidad
                        
                    </div>
                    <div class="col-md-7 text-left">

                        {{$est->localidad->nombre}}
                    </div>

                    <div class="col-md-5 text-right" >
                        Dirección
                        
                    </div>
                    <div class="col-md-7 text-left">

                        {{$est->calle}} {{$est->numero}} {{$est->piso}} {{$est->depto}}
                    </div>

                    <div class="col-md-5 text-right" >
                        Teléfono
                        
                    </div>
                    <div class="col-md-7 text-left">

                        {{$est->telefono}}
                    </div>
                    @isset($email)
                        
                    <div class="col-md-5 text-right" >
                        Email
                        
                    </div>
                    <div class="col-md-7 text-left">

                        {{$est->email}}
                    </div>

                    @endisset
                    
                    <div class="col-md-5 text-right" >
                        Especialidades
                        
                    </div>
                    <div class="col-md-7 text-left">

                        @foreach ($est->especialidades as $esp)
                            {{$esp->especialidad->nombre}}  &nbsp;
                            @endforeach
                    </div>

                </div>


            </div> 

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button> 
        </div>
      </div>
    </div>
  </div>

       
               
      <tr>
        <td>{{$est->nombre}} </th>
        <td>{{$est->localidad->nombre}}</td>
        <td>{{$est->calle}} {{$est->numero}} {{$est->piso}} {{$est->depto}}</td> 
        <td>
            <button type="button" class="btn btn-primary  btn-sm pt-0 m-0" data-toggle="modal" data-target="#exampleModal{{$est->id}}">
                +
              </button>    
        </td>
      </tr>
                        
                 
                     

              @endforeach
              
                </tbody>
            </table> 


<br>  
             
                <ul class="pagination" style="padding-bottom:15px;width:200px;margin:auto;">
                    <li class="paginate_button page-item previous 
                    @if ($establecimientos_seleccionados->currentPage() === 1)
                    disabled 
                    @endif
                    " id="anterior">
                    <a href="{{$establecimientos_seleccionados->previousPageUrl()}}" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">
                        Anterior
                    </a>
                    </li>
                    <li class="paginate_button page-item active">
                        <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">
                        {{$establecimientos_seleccionados->currentPage()}}
                        </a>
                    </li>
                    <li class="paginate_button page-item next
                    @if ($establecimientos_seleccionados->currentPage() === $establecimientos_seleccionados->lastPage())
                    disabled 
                    @endif
                    " id="siguiente">
                        <a href="{{$establecimientos_seleccionados->nextPageUrl()}}" aria-controls="example2" data-dt-idx="7" 
                        tabindex="0" class="page-link">Siguiente
                        </a>
                    </li>
                </ul>  
                       
    


        </section>

        <br><p></p>  
        <div class="container">
        <div class="row" style='background:white;padding:20px;'>
            <div class="col-md-3 pt-10 center">
            </div>
            <div class="col-md-2 pt-10 center">
            <br>
            <center>
            <a href="/archivo/Prestadores2023" rel="noopener noreferrer" download style='color:black;'>
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