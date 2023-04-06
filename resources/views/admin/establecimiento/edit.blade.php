@extends ('layouts.admin')

@section('titulo',''.$establecimiento->nombre)

@section('breadcrumb')

  <li class="breadcrumb-item"><a href="{{route('admin.establecimiento.index')}}">Establecimientos</a></li>

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

    
    <form action="{{route('admin.establecimiento.update',$establecimiento->id)}}" method='POST'>

@csrf



@method('PUT')
    @method('PUT')



    <span style='display:none;' id='editar'>{{$editar}}</span>

       
    <div id="apiprestador"> 
    

    <div class="card-header p-0 pt-1" style='background: #007bff;'>
          <ul class="nav nav-tabs" id="tabs" role="tablist" style='border:0px;'>
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#tab_datos" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">
                Datos principales
              </a>
            </li> 
          </ul>
    </div>
    <div class="card-body">
      <div class="tab-content" id="custom-tabs-one-tabContent">
        <div class="tab-pane fade show active" id="tab_datos" role="tabpanel" aria-labelledby="tab_datos">
        <div class="row">
            
            
            <div class="col-6 py-2"> 
                <label for="apellido">Nombre del establecimiento</label> 
                <input  
                class="form-control" type="text" name="nombre" id="nombre"
                value="{{old('nombre', $establecimiento->nombre)}}" /> 
            </div>

 
            <div class="col-6 py-2">
              <label for="cuit">CUIT</label>
              <input 
              v class="form-control" type="number" name="cuit" id="cuit"
              value="{{old('cuit',$establecimiento->cuit)}}" />
            </div>  

            
            <div class="col-6 py-2">
                <label for="tipoestablecimiento" >Tipo Establecimiento </label>
                
                <SELECT   style='width: 100%;
                    height: 44px;
                    border: 2px solid gray;
                    padding-left: 12px;
                    padding-right: 12px;
                    border-radius:5px;
                    position: relative;
                    font-size: 16px;   color: #6c6c6c;' id='tipoestablecimiento' name='tipoestablecimiento' data-old="{{old('tipoestablecimiento', $establecimiento->tipo_establecimiento_id)}}"> 
                    @foreach($tiposestablecimientos as $tipo)
                        <option value="{{$tipo->id}}" >
                        {{$tipo->nombre}}
                    </option>
                    @endforeach
                </SELECT>
            </div> 
            
            <div class="col-6 py-2">
            </div> 


            <div class="col-6 py-2">
              <label for="email">Email</label>
              <input  
              class="form-control" type="email" name="email" id="email"
              value="{{old('email',$establecimiento->email)}}" />
            </div> 
              
            <div class="col-6 py-2">
              <label for="telefono">Teléfono</label>
              <input  
              class="form-control" type="text" name="telefono" id="telefono"
              value="{{old('telefono',$establecimiento->telefono)}}" />
            </div> 
            <div class="col-6 py-2">

            <label for="provincias" >Provincia </label>
            
            <SELECT v-model='selected_provincia'  @change='loadLocalidades' style='width: 100%;
                height: 44px;
                border: 2px solid gray;
                padding-left: 12px;
                padding-right: 12px;
                border-radius:5px;
                position: relative;
                font-size: 16px;   color: #6c6c6c;' id='provincia' name='provincia' data-old="{{old('provincia',$establecimiento->localidad->provincia->id)}}"> 
                @foreach($provincias as $prov)
                    <option value="{{$prov->id}}" >
                    {{$prov->nombre}}
                    </option>
                @endforeach
                </SELECT>
            <i class="lni lni-card"></i>
                              


              @error('provincia')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror 

            </div>
            <div class="col-6 py-2">
            <label for="localidades" >Localidad </label>

                <SELECT v-model='selected_localidad' style='width: 100%;
                            height: 44px;
                            border: 2px solid gray;
                            border-radius:5px;
                            padding-left: 12px;
                            padding-right: 12px;
                            position: relative;
                            font-size: 16px;   color: #6c6c6c;' id='localidad' name='localidad' data-old="{{old('localidad',$establecimiento->localidad->id,1271)}}">
                                <option v-for='localidad in localidades' v-bind:value='localidad.id'>   
                                @{{localidad.nombre}}
                                </option>  
                            </SELECT>
                @error('localidad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div>
          <div class="col-6 py-2">
            <label for="calle" >Calle</label>

                <input id="calle" type="text" class="form-control @error('calle') is-invalid @enderror" name="calle" value="{{ old('calle',$establecimiento->calle) }}" required autocomplete="calle">

                @error('calle')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div> 
          <div class="col-3 py-2">
            <label for="numero" >Número</label>

                <input id="numero" type="number" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero',$establecimiento->numero)}}" required autocomplete="numero">

                @error('numero')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div> 
          <div class="col-3 py-2">
             
          </div> 
          <div class="col-3 py-2">
            <label for="depto" >Piso</label>

                <input id="piso" type="number" class="form-control @error('piso') is-invalid @enderror" name="piso" value="{{ old('piso',$establecimiento->piso)}}" >

                @error('piso')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div> 
          <div class="col-3 py-2">
            <label for="depto" >Depto.</label>

                <input id="depto" type="text" class="form-control @error('depto') is-invalid @enderror" name="depto" value="{{ old('depto',$establecimiento->depto)}}" >

                @error('depto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div> 
        
        </div>
           

            
        </div>  
         
      </div> <!-- Final al contenido de los tabs --> 
    </div> <!-- Final del cuerpo de la tarjeta -->
    <div class="card-footer text-center"> 
      <a href="{{ route('cancelar','admin.establecimiento.index')}}" class='btn btn-danger float-left'>Cancelar</a> 
      <a href="/admin/establecimiento/{{$establecimiento->id}}/especialidades/" class='btn btn-secondary '>Administrar Especialidades</a> 
      <input type="submit" value="Guardar" class='btn btn-primary float-right'> 
    </div> 
  

  </form> 
  </div>  
 

  

@endsection