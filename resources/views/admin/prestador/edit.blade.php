@extends ('layouts.admin')

@section('titulo','Prestador '.$persona->apellido.' '.$persona->nombres)

@section('breadcrumb')

  <li class="breadcrumb-item"><a href="{{route('admin.prestador.index')}}">Prestadores</a></li>

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

    
    <form action="{{route('admin.prestador.update',$persona->id)}}" method='POST'>

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
              <label for="cuit">CUIT</label>
              <input 
              v class="form-control" type="text" name="cuit" id="cuit"
              value="{{old('cuit',$persona->cuit)}}" />
            </div> 
            <div class="col-6 py-2">
               
            </div> 
            <div class="col-6 py-2"> 
                <label for="apellido">Apellido</label>
                <input  
                class="form-control" type="text" name="apellido" id="apellido"
                value="{{old('apellido', $persona->apellido)}}" /> 
            </div>
            <div class="col-6 py-2"> 
                <label for="nombres">Nombres</label> 
                <input  
                class="form-control" type="text" name="nombres" id="nombres"
                value="{{old('nombres', $persona->nombres)}}" /> 
            </div>
           
            <div class="col-6 py-2">
              <label for="nacimiento">Fecha de Nacimiento</label>
              <input 
              v class="form-control" type="date" name="nacimiento" id="nacimiento"
              value="{{old('nacimiento',$persona->nacimiento)}}" />
            </div> 
             
            <div class="col-6 py-2">
              <label for="telefono">Teléfono</label>
              <input  
              class="form-control" type="number" name="telefono" id="telefono"
              value="{{old('telefono',$persona->telefono)}}" />
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
                font-size: 16px;   color: #6c6c6c;' id='provincia' name='provincia' data-old="{{old('provincia',$persona->localidad->provincia->id)}}"> 
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
                            font-size: 16px;   color: #6c6c6c;' id='localidad' name='localidad' data-old="{{old('localidad',$persona->localidad->id,1271)}}">
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

                <input id="calle" type="text" class="form-control @error('calle') is-invalid @enderror" name="calle" value="{{ old('calle',$persona->calle) }}" required autocomplete="calle">

                @error('calle')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div> 
          <div class="col-3 py-2">
            <label for="numero" >Número</label>

                <input id="numero" type="number" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero',$persona->numero)}}" required autocomplete="numero">

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

                <input id="piso" type="number" class="form-control @error('piso') is-invalid @enderror" name="piso" value="{{ old('piso',$persona->piso)}}" >

                @error('piso')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div> 
          <div class="col-3 py-2">
            <label for="depto" >Depto.</label>

                <input id="depto" type="text" class="form-control @error('depto') is-invalid @enderror" name="depto" value="{{ old('depto',$persona->depto)}}" >

                @error('depto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div> 
        
        </div>
           

            
        </div>  
        <!--
        <div class="tab-pane fade show active" id="tab_prestaciones" role="tabpanel" aria-labelledby="tab_prestaciones">
        
        <a href="admin/prestador/{{ $persona->id }}/nuevaprestacion">
        <div class="btn btn-success"> <i class="fas fa-plus-circle"></i> &nbsp;Agregar prestación </div>
        </a>
        <br> <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Matrícula</th>
                <th scope="col">Especialidad</th>
                <th scope="col">Tipo</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @forelse ($persona->prestaciones as $prestacion)
                <tr>
                    <th scope="row"> 
                        {{ $prestacion->matricula }}
                    </th>
                    <td> 
                        {{ $prestacion->especialidad->nombre }}
                    </td>
                    <td>
                        {{ $prestacion->tipo_prestacion->nombre }}
                    </td>
                    <td> 
                    <a wire:click="edit({{ $prestacion->id }})" class="px-2 py-1 bg-blue-200 text-blue-500 hover:bg-blue-500 hover:text-white rounded">
                        <i class="far fa-edit"></i>
                    </a>
                    <a wire:click="destroy({{ $prestacion->id }})" class="px-2 py-1 bg-red-200 text-red-500 hover:bg-red-500 hover:text-white rounded">
                        <i class="far fa-trash-alt"></i>
                    </a>
                        
                    </td>
                </tr>
            @empty
                <tr class="text-center">
                    <td colspan="4" class="py-3 italic">No hay información</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        
        
        
        </div>-->
      </div> <!-- Final al contenido de los tabs --> 
    </div> <!-- Final del cuerpo de la tarjeta -->
    <div class="card-footer text-center"> 
      <a href="{{ route('cancelar','admin.prestador.index')}}" class='btn btn-danger float-left'>Cancelar</a> 
      <a href="/admin/prestador/{{$persona->id}}/prestaciones/" class='btn btn-secondary '>Administrar Prestaciones</a> 
      <input type="submit" value="Guardar" class='btn btn-primary float-right'> 
    </div> 
  

  </form> 
  </div>  
 

  

@endsection