@extends ('layouts.admin')

@section('titulo','Agregar Establecimiento a '.$plan->nombre)

@section('breadcrumb')

  <li class="breadcrumb-item"><a href="{{route('admin.plan.index')}}">Planes</a></li>

  <li class="breadcrumb-item active">@yield('titulo')</li>

@endsection

@section('contenido')

 

<div class="card">      

    <!--<form action="/admin/prestador/{{$plan->id}}/agregarprestacion/" method='POST'>-->
    <form action="{{route('admin.plan.agregarestablecimiento',$plan->id)}}" method='POST'>

      @csrf
        
     
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
        <div class="tab-pane fade show active" id="tab_datos" role="tabpanel" aria-labelledby="tab_datos">
        <div class="row">
             
             
            <div class="col-12 py-2">

              <label for="especialidad" >Establecimiento </label>
              
              <SELECT   style='width: 100%;
                height: 44px;
                border: 2px solid gray;
                padding-left: 12px;
                padding-right: 12px;
                border-radius:5px;
                position: relative;
                font-size: 16px;   color: #6c6c6c;' id='establecimiento' name='establecimiento' data-old="{{old('establecimiento')}}">                
                @foreach($establecimientos as $est)
                    <option value="{{$est->id}}" 
                      @if($est->id==old('establecimiento'))
                      selected
                      @endif
                      >

                    {{$est->nombre}}
                    </option>
                @endforeach
                </SELECT>
              <i class="lni lni-card"></i>


                                


                @error('establecimiento')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 

            </div>


            <div class="col-12 py-2">

              <label for="detalle" >Detalle </label> 

              <input  
              class="form-control" type="text" name="detalle" id="detalle">


              
                                


                @error('establecimiento')
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
        <a href="{{ route('cancelar','admin.plan.index')}}" class='btn btn-danger'>Cancelar</a> 
        <input type="submit" value="Guardar" class='btn btn-primary float-right'> 
      </div> 
  </form> 
  </div>  
 

  

@endsection