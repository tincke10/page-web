@extends ('layouts.admin')

@section('titulo','Editar consulta')

@section('breadcrumb')

  <li class="breadcrumb-item"><a href="{{route('admin.consulta.index')}}">Consultas</a></li>

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

        

      <form action="{{route('admin.consulta.update',$con->id)}}" method='POST'>

        @csrf



        @method('PUT')



        <span style='display:none;' id='editar'>{{$editar}}</span>

        <span style='display:none;' id='nombretemp'>{{$con->nombre}}</span> 

      <div id="apiespecialidad">

        
            
        <div class="card-header p-0 pt-1" style='background: #007bff;'>
          <ul class="nav nav-tabs" id="tabs" role="tablist" style='border:0px;'>
            <li class="nav-item">
              <a class="nav-link active" id="consulta-tab" data-toggle="pill" href="#consulta" role="tab" aria-controls="consulta" aria-selected="true">
                Consulta
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="historial-tab" data-toggle="pill" href="#historial" role="tab" aria-controls="historial" aria-selected="false">
                Historial
              </a>
            </li>
          </ul>
        </div>

        <div class="card-body">
          <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade show active" id="consulta" role="tabpanel" aria-labelledby="consulta">
        <div class="row">
          <div class="col-md-6"> 
            <div class="form-group"> 
              <label for="apellido">Apellido</label>
              <input  class="form-control" type="text" name="apellido" id="apellido" value="{{$con->apellido}}">
            </div>
          </div>
          <div class="col-md-6"> 
            <div class="form-group"> 
              <label for="nombre">Nombres</label>
              <input  class="form-control" type="text" name="nombres" id="nombres" value="{{$con->nombres}}">
            </div>
          </div>
          <div class="col-md-6"> 
            <div class="form-group"> 
              <label for="nrodocumento">Nro. Documento</label>
              <input  class="form-control" type="text" name="nrodocumento" id="nrodocumento" value="{{$con->nrodocumento}}">
            </div>
          </div>
          <div class="col-md-6"> 
             
          </div>
          <div class="col-md-6"> 
            <div class="form-group"> 
              <label for="localidad">Localidad</label>
              <input  class="form-control" type="text" name="localidad" id="localidad" value="{{$con->localidad}}">
            </div>
          </div>
          <div class="col-md-6"> 
            <div class="form-group"> 
              <label for="email">E-mail</label>
              <input  class="form-control" type="text" name="email" id="email" value="{{$con->email}}">
            </div>
          </div> 
          <div class="col-md-6"> 
            <div class="form-group"> 
              <label for="prefijo">Prefijo</label>
              <input  class="form-control" type="text" name="prefijo" id="prefijo" value="{{$con->prefijo}}">
            </div>
          </div>
          <div class="col-md-6"> 
            <div class="form-group"> 
              <label for="telefono">Teléfono</label>
              <input  class="form-control" type="text" name="telefono" id="telefono" value="{{$con->telefono}}">
            </div>
          </div>
          <div class="col-md-6"> 
            <div class="form-group"> 
              <label for="consulta">Consulta</label>
              <textarea class="form-control" name="consulta" id="consulta" cols='30' rows='5'>{{$con->consulta}}
              </textarea>
            </div>
          </div>
          <div class="col-md-6"> 
            <div class="form-group"> 
              <label for="nombre">Observaciones</label>
              <textarea class="form-control" name="observaciones" id="observaciones" cols='30' rows='5'>{{$con->observaciones}}
              </textarea>
            </div>
          </div>
          
          <div class="col-md-6"> 
            <div class="form-group">
              <label for="estado">Estado</label>
              
              <select name="estado" id="estado" class="form-control"  >



              

                  <option value="ABIERTO" 
                    @if ('ABIERTO' ==$con->estado) 
                      selected="selected"
                    @endif 
                      >ABIERTO</option>

                  <option value="EN CURSO" 
                    @if ('EN CURSO' ==$con->estado) 
                      selected="selected"
                    @endif 
                      >EN CURSO</option>
                  <option value="CERRADO" 
                    @if ('CERRADO' ==$con->estado) 
                      selected="selected"
                    @endif 
                      >CERRADO</option>

                  <option value="NO PROCEDENTE" 
                    @if ('NO PROCEDENTE' ==$con->estado) 
                      selected="selected"
                    @endif 
                      >NO PROCEDENTE</option>

               </select>

 
            </div>
          </div>
          
          <div class="col-md-6"> 
            
            <div class="col-6 py-2">
              <label for="fecha_reprogramacion">Fecha de Reprogramación</label>
              <input 
              v class="form-control" type="date" name="fecha_reprogramacion" id="fecha_reprogramacion"
              value="{{old('fecha_reprogramacion',$con->fecha_reprogramacion)}}" />
            </div> 
             
          </div>

          <div class="col-md-6"> 
            <div class="form-group">
              <label for="area">Área</label>
 
              
              <select name="area" id="area" class="form-control" >
                <option value="NINGUNA" 
                    @if ('NINGUNA' ==$con->area) 
                      selected="selected"
                    @endif 
                      >NINGUNA</option>
                  <option value="ADMINISTRACION" 
                    @if ('ADMINISTRACION' ==$con->area) 
                      selected="selected"
                    @endif 
                      >ADMINISTRACION</option>
                  <option value="AFILIACIONES" 
                    @if ('AFILIACIONES' ==$con->area) 
                      selected="selected"
                    @endif 
                      >AFILIACIONES</option>
                  <option value="AUDITORIA MEDICA" 
                    @if ('AUDITORIA MEDICA' ==$con->area) 
                      selected="selected"
                    @endif 
                      >AUDITORIA MEDICA</option>

                      
                  <option value="DISCAPACIDAD" 
                    @if ('DISCAPACIDAD' ==$con->area) 
                      selected="selected"
                    @endif 
                      >DISCAPACIDAD</option>

                  <option value="FACTURACION" 
                    @if ('FACTURACION' ==$con->area) 
                      selected="selected"
                    @endif 
                      >FACTURACION</option>

                  <option value="FISCALIZACION" 
                    @if ('FISCALIZACION' ==$con->area) 
                      selected="selected"
                    @endif 
                      >FISCALIZACION</option>

                      <option value="PROMOCION" 
                      @if ('PROMOCION' ==$con->area) 
                        selected="selected"
                      @endif 
                        >PROMOCION</option>

                      <option value="SUR" 
                    @if ('SUR' ==$con->area) 
                      selected="selected"
                    @endif 
                      >SUR</option>


               </select>
              </div>
            </div>



          <div class="col-md-6"> 
            <div class="form-group">
              <label for="area">Medio</label>
 
              
              <select name="medio" id="medio" class="form-control" >
                <option value="PERSONAL" 
                    @if ('PERSONAL' ==$con->medio) 
                      selected="selected"
                    @endif 
                      >PERSONAL</option>
                   

                  <option value="EMAIL" 
                    @if ('EMAIL' ==$con->medio) 
                      selected="selected"
                    @endif 
                      >EMAIL</option>

                  <option value="TELEFONO" 
                    @if ('TELEFONO' ==$con->medio) 
                      selected="selected"
                    @endif 
                      >TELEFONO</option>

                      <option value="WHATSAPP" 
                      @if ('WHATSAPP' ==$con->medio) 
                        selected="selected"
                      @endif 
                        >WHATSAPP</option>

                      <option value="FACEBOOK" 
                      @if ('FACEBOOK' ==$con->area) 
                        selected="selected"
                      @endif 
                        >FACEBOOK</option>
  

                        <option value="INSTAGRAM" 
                        @if ('INSTAGRAM' ==$con->medio) 
                          selected="selected"
                        @endif 
                          >INSTAGRAM</option>
                          
                      <option value="WEB" 
                      @if ('WEB' ==$con->medio) 
                        selected="selected"
                      @endif 
                        >WEB</option>
  
  
    
          
               </select>
              </div>
            </div>

          </div> 

 
      </div>  
      <div class="tab-pane fade" id="historial" role="tabpanel" aria-labelledby="historial">
           
          <table class="table">
            <thead>
            <tr>
                <th scope="col">Fecha de cambio</th>
                <th scope="col">Estado</th>
                <th scope="col">Área</th>
                <th scope="col">Reprogramación</th>
                <th scope="col">Observaciones</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($con->historial as $his)
                <tr>
                    <th scope="row"> 
                        {{ $his->created_at->format('d/m/Y') }}
                    </th>
                    <td> 
                        {{ $his->estado }}
                    </td>
                    <td>
                        {{ $his->area }}
                    </td>
                    <td>  
                      {{ $his->fecha_reprogramacion }}
                    </td>
                    <td>
                      {{ $his->observaciones }}
                  </td>
                </tr>
            @empty
                <tr class="text-center">
                    <td colspan="4" class="py-3 italic">No hay cambios</td>
                </tr>
            @endforelse
            </tbody>
          </table>
          
        </div>
      </div>

        </div>  
        <!-- /.card-body -->

        <div class="card-footer">



        <a href="{{ route('cancelar','admin.consulta.index')}}" class='btn btn-danger'>Cancelar</a>



        <input  type="submit" value="Guardar" class='btn btn-primary float-right'>

               

        </div>

        

        </div>

        </form>

        <!-- /.card-footer-->

      </div>

      <!-- /.card -->

  

@endsection