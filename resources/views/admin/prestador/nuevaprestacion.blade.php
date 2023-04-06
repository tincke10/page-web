@extends ('layouts.admin')

@section('titulo','Agregar prestación a '.$persona->apellido.' '.$persona->nombres)

@section('breadcrumb')

  <li class="breadcrumb-item"><a href="{{route('admin.prestador.index')}}">Prestadores</a></li>

  <li class="breadcrumb-item active">@yield('titulo')</li>

@endsection

@section('contenido')

 

<div class="card">      

    <!--<form action="/admin/prestador/{{$persona->id}}/agregarprestacion/" method='POST'>-->
    <form action="{{route('admin.prestador.agregarprestacion',$persona->id)}}" method='POST'>

      @csrf
        
     
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
        <div class="tab-pane fade show active" id="tab_datos" role="tabpanel" aria-labelledby="tab_datos">
        <div class="row">
            <div class="col-6 py-2">
              <label for="cuit">Matrícula</label>
              <input 
              v class="form-control" type="text" name="matricula" id="matricula"
              value="{{old('matricula')}}" />
            </div> 
            <div class="col-6 py-2">
               
            </div> 
             
            <div class="col-12 py-2">

              <label for="especialidad" >Especialidad </label>
              
              <SELECT   style='width: 100%;
                height: 44px;
                border: 2px solid gray;
                padding-left: 12px;
                padding-right: 12px;
                border-radius:5px;
                position: relative;
                font-size: 16px;   color: #6c6c6c;' id='especialidad' name='especialidad' data-old="{{old('especialidad')}}"> 
                @foreach($especialidades as $esp)
                    <option value="{{$esp->id}}" >
                    {{$esp->nombre}}
                    </option>
                @endforeach
                </SELECT>
              <i class="lni lni-card"></i>
                                


                @error('especialidad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 

            </div>
            
            <div class="col-12 py-2">

              <label for="tipo_prestacion" >Tipo de prestación </label>

              <SELECT   style='width: 100%;
                height: 44px;
                border: 2px solid gray;
                padding-left: 12px;
                padding-right: 12px;
                border-radius:5px;
                position: relative;
                font-size: 16px;   color: #6c6c6c;' id='tipo_prestacion' name='tipo_prestacion' data-old="{{old('tipo_prestacion')}}"> 
                @foreach($tiposprestaciones as $tp)
                    <option value="{{$tp->id}}" >
                    {{$tp->nombre}}
                    </option>
                @endforeach
                </SELECT>
              <i class="lni lni-card"></i>
                                


                @error('tipo_prestacion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 

              </div>
        
        </div>
           
        </div>
            
         
        </div> <!-- Final al contenido de los tabs --> 
      </div> <!-- Final del cuerpo de la tarjeta -->
      <div class="card-footer"> 
        <a href="{{ route('cancelar','admin.prestador.index')}}" class='btn btn-danger'>Cancelar</a> 
        <input type="submit" value="Guardar" class='btn btn-primary float-right'> 
      </div> 
  </form> 
  </div>  
 

  

@endsection