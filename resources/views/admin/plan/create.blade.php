@extends ('layouts.admin')

@section('titulo','Nuevo plan')

@section('breadcrumb')

  <li class="breadcrumb-item"><a href="{{route('admin.plan.index')}}">Planes</a></li>

  <li class="breadcrumb-item active">@yield('titulo')</li>

@endsection

@section('contenido')



<style>
  .nav-tabs .nav-link {
    color:white;
    border:none;
  }
</style>

<div class="card">      

    <form action="{{ route('admin.plan.store') }}" method='POST'>
      @csrf
       
    <div id="apiprestador"> 
    

    <div class="card-header p-0 pt-1" style='background: #007bff;'>
          <ul class="nav nav-tabs" id="tabs" role="tablist" style='border:0px;'>
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#tab_datos" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">
                Datos principales
              </a>
            </li>
             
             <!--
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#tab_prestaciones" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">
                Prestaciones
              </a>
            </li>
             -->
             
          </ul>
    </div>
    <div class="card-body">
      <div class="tab-content" id="custom-tabs-one-tabContent">
        <div class="tab-pane fade show active" id="tab_datos" role="tabpanel" aria-labelledby="tab_datos">
        <div class="row">
            
        
          <div class="col-6 py-2"> 
            <label for="nombre">Nombre del plan</label> 
            <input  
            class="form-control" type="text" name="nombre" id="nombre"
            value="{{old('nombre')}}" /> 
        </div>
        <div class="col-6 py-2"> 
          <label for="slug">Slug</label> 
          <input  
          class="form-control" type="text" name="slug" id="slug"
          value="{{old('slug')}}" /> 
        </div>


        
        <div class="col-6 py-2">
            <label for="entidad" >Entidad </label>
            
            <SELECT   style='width: 100%;
                height: 44px;
                border: 2px solid gray;
                padding-left: 12px;
                padding-right: 12px;
                border-radius:5px;
                position: relative;
                font-size: 16px;   color: #6c6c6c;' id='entidad' name='entidad' data-old="{{old('entidad')}}"> 
                @foreach($entidades as $ent)
                    <option value="{{$ent->id}}" >
                    {{$ent->nombre}}
                </option>
                @endforeach
            </SELECT>
        </div> 
         

        <div class="col-6 py-2">   
        </div>
        
        </div>
           

            
        </div>  
         
      </div> <!-- Final al contenido de los tabs --> 
    </div> <!-- Final del cuerpo de la tarjeta -->
    <div class="card-footer text-center" > 
      <a href="{{ route('cancelar','admin.plan.index')}}" class='btn btn-danger float-left'>Cancelar</a> 
      <a  class='btn btn-secondary disabled'>Administrar establecimientos</a> 



      <input type="submit" value="Guardar" class='btn btn-primary float-right'> 
    </div> 
  

  </form> 
  </div>  
 

  

@endsection