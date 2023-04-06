@extends ('layouts.admin')

@section('titulo','Agregar Especialidad a '.$establecimiento->nombre)

@section('breadcrumb')

  <li class="breadcrumb-item"><a href="{{route('admin.establecimiento.index')}}">Establecimientos</a></li>

  <li class="breadcrumb-item active">@yield('titulo')</li>

@endsection

@section('contenido')

 

<div class="card">      

    <!--<form action="/admin/prestador/{{$establecimiento->id}}/agregarprestacion/" method='POST'>-->
    <form action="{{route('admin.establecimiento.agregarespecialidad',$establecimiento->id)}}" method='POST'>

      @csrf
        
     
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
        <div class="tab-pane fade show active" id="tab_datos" role="tabpanel" aria-labelledby="tab_datos">
        <div class="row">
             
             
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
            
            
        
        </div>
           
        </div>
            
         
        @foreach($planes as $plan)
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input"  checked
                id="plan_{{$plan->id}}"
                value="{{$plan->id}}"
                name="planes[]" 
                @if(is_array(old('planes'))&&in_array("$plan->id",old('planes')))
                    checked 
                @endif
                >
            <label class="custom-control-label" for="plan_{{$plan->id}}">
                {{$plan->nombre}} <em> {{$plan->entidad->nombre}}</em>
            </label>
        </div>
    @endforeach



        </div> <!-- Final al contenido de los tabs --> 
      </div> <!-- Final del cuerpo de la tarjeta -->
      <div class="card-footer"> 
        <a href="{{ route('cancelar','admin.establecimiento.index')}}" class='btn btn-danger'>Cancelar</a> 
        <input type="submit" value="Guardar" class='btn btn-primary float-right'> 
      </div> 
  </form> 
  </div>  
 

  

@endsection