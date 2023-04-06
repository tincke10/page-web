@extends ('layouts.admin')

@section('titulo','Nueva consulta')

@section('breadcrumb')

  <li class="breadcrumb-item"><a href="{{route('admin.consulta.index')}}">Consultas</a></li>

  <li class="breadcrumb-item active">@yield('titulo')</li>

@endsection

@section('contenido')



      <div class="card">

        

      <form action="{{route('admin.consulta.store')}}" method='POST'>

        @csrf

 



        <span style='display:none;' id='editar'>{{$editar}}</span>

        <span style='display:none;' id='nombretemp'></span> 

      <div id="apiespecialidad">

        <div class="card-header">

          <h3 class="card-title">Administración de Consultas </h3>



          <div class="card-tools">

            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">

              <i class="fas fa-minus"></i></button>

            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">

              <i class="fas fa-times"></i></button>

          </div>

        </div>

        <div class="card-body">

    
        <div class="row">
          <div class="col-md-6"> 
            <div class="form-group"> 
              <label for="apellido">Apellido</label>
              <input  class="form-control" type="text" name="apellido" id="apellido" value="{{old('apellido')}}">
            </div>
          </div>
          <div class="col-md-6"> 
            <div class="form-group"> 
              <label for="nombre">Nombres</label>
              <input  class="form-control" type="text" name="nombres" id="nombres" value="{{old('nombres')}}">
            </div>
          </div>
          <div class="col-md-6"> 
            <div class="form-group"> 
              <label for="nrodocumento">Nro. Documento</label>
              <input  class="form-control" type="text" name="nrodocumento" id="nrodocumento" value="{{old('nrodocumento')}}">
            </div>
          </div>
          <div class="col-md-6"> 
             
          </div>
          <div class="col-md-6"> 
            <div class="form-group"> 
              <label for="localidad">Localidad</label>
              <input  class="form-control" type="text" name="localidad" id="localidad" value="{{old('localidad')}}">
            </div>
          </div>
          <div class="col-md-6"> 
            <div class="form-group"> 
              <label for="email">E-mail</label>
              <input  class="form-control" type="text" name="email" id="email" value="{{old('email')}}">
            </div>
          </div> 
          <div class="col-md-6"> 
            <div class="form-group"> 
              <label for="prefijo">Prefijo</label>
              <input  class="form-control" type="text" name="prefijo" id="prefijo" value="{{old('prefijo')}}">
            </div>
          </div>
          <div class="col-md-6"> 
            <div class="form-group"> 
              <label for="telefono">Teléfono</label>
              <input  class="form-control" type="text" name="telefono" id="telefono" value="{{old('telefono')}}">
            </div>
          </div>
          <div class="col-md-6"> 
            <div class="form-group"> 
              <label for="consulta">Consulta</label>
              <textarea class="form-control" name="consulta" id="consulta" cols='30' rows='5'>{{old('consulta')}}
              </textarea>
            </div>
          </div>
          <div class="col-md-6"> 
            <div class="form-group"> 
              <label for="observaciones">Observaciones</label>
              <textarea class="form-control" name="observaciones" id="observaciones" cols='30' rows='5'>{{old('observaciones')}}
              </textarea>
            </div>
          </div>
          
          <div class="col-md-6"> 
            <div class="form-group">
              <label for="estado">Estado</label>
              
              <select name="estado" id="estado" class="form-control"  >



              

                  <option value="ABIERTO" 
                    @if ('ABIERTO' ==old('estado')) 
                      selected="selected"
                    @endif 
                      >ABIERTO</option>

                  <option value="EN CURSO" 
                    @if ('EN CURSO' ==old('estado')) 
                      selected="selected"
                    @endif 
                      >EN CURSO</option>
                  <option value="CERRADO" 
                    @if ('CERRADO' ==old('estado')) 
                      selected="selected"
                    @endif 
                      >CERRADO</option>

                  <option value="NO PROCEDENTE" 
                    @if ('NO PROCEDENTE' ==old('estado')) 
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
              value="{{old('fecha_reprogramacion')}}" />
            </div> 
             
          </div>

          <div class="col-md-6"> 
            <div class="form-group">
              <label for="area">Área</label>
 
              
              <select name="area" id="area" class="form-control" >
                <option value="NINGUNA" 
                    @if ('NINGUNA' ==old('area')) 
                      selected="selected"
                    @endif 
                      >NINGUNA</option>
                  <option value="ADMINISTRACION" 
                    @if ('ADMINISTRACION' ==old('area')) 
                      selected="selected"
                    @endif 
                      >ADMINISTRACION</option>
                  <option value="AFILIACIONES" 
                    @if ('AFILIACIONES' ==old('area')) 
                      selected="selected"
                    @endif 
                      >AFILIACIONES</option>
                  <option value="AUDITORIA MEDICA" 
                    @if ('AUDITORIA MEDICA' ==old('area')) 
                      selected="selected"
                    @endif 
                      >AUDITORIA MEDICA</option>

                      
                  <option value="DISCAPACIDAD" 
                    @if ('DISCAPACIDAD' ==old('area')) 
                      selected="selected"
                    @endif 
                      >DISCAPACIDAD</option>

                  <option value="FACTURACION" 
                    @if ('FACTURACION' ==old('area')) 
                      selected="selected"
                    @endif 
                      >FACTURACION</option>

                  <option value="FISCALIZACION" 
                    @if ('FISCALIZACION' ==old('area')) 
                      selected="selected"
                    @endif 
                      >FISCALIZACION</option>

                      <option value="PROMOCION" 
                      @if ('PROMOCION' ==old('area')) 
                        selected="selected"
                      @endif 
                        >PROMOCION</option>

                      <option value="SUR" 
                    @if ('SUR' ==old('area')) 
                      selected="selected"
                    @endif 
                      >SUR</option>


               </select>
              </div>
            </div>



          <div class="col-md-6"> 
            <div class="form-group">
              <label for="area">Medio</label>
 
              
              <select name="area" id="area" class="form-control" >
                <option value="PERSONAL" 
                    @if ('PERSONAL' ==old('medio')) 
                      selected="selected"
                    @endif 
                      >PERSONAL</option>
                   

                  <option value="EMAIL" 
                    @if ('EMAIL' ==old('medio')) 
                      selected="selected"
                    @endif 
                      >EMAIL</option>

                  <option value="TELEFONO" 
                    @if ('TELEFONO' ==old('medio')) 
                      selected="selected"
                    @endif 
                      >TELEFONO</option>

                      <option value="WHATSAPP" 
                      @if ('WHATSAPP' ==old('medio')) 
                        selected="selected"
                      @endif 
                        >WHATSAPP</option>

                      <option value="FACEBOOK" 
                      @if ('FACEBOOK' ==old('medio')) 
                        selected="selected"
                      @endif 
                        >FACEBOOK</option>
  

                        <option value="INSTAGRAM" 
                        @if ('INSTAGRAM' ==old('medio')) 
                          selected="selected"
                        @endif 
                          >INSTAGRAM</option>
                          
                      <option value="WEB" 
                      @if ('WEB' ==old('medio')) 
                        selected="selected"
                      @endif 
                        >WEB</option>
  
  
    
          
               </select>
              </div>
            </div>
          </div>

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