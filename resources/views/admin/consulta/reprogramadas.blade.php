@extends ('layouts.admin')

@section('titulo','Reprogramaciones')

@section('breadcrumb')

<li class="breadcrumb-item active">@yield('titulo')</li>

@endsection

@section('contenido')

 

<div class="row" id='confirmareliminar'>

<span style='display:none;' id='URLbase'>{{route('admin.consulta.index')}}</span>

@include('custom.modal_eliminar')

          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sección de consultas y reclamos</h3>
                <div class="card-tools">

                 <form>

                    <div class="input-group input-group-sm" style="width: 150px;">

                      <input type="text" name="nombre" class="form-control float-right" 

                      placeholder="Buscar"

                      value="{{request()->get('nombre')}}"

                      >                     



                      <div class="input-group-append">

                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>

                      </div>

                    </div>

                  </form>

                </div>

              </div>

              <!-- /.card-header -->

              <div class="card-body table-responsive p-0" style="height: 500px;">

               
 
              <a class='m-2 float-right btn btn-primary' href="/exportar_reprogramadas">Exportar a excel</a>
              <a class='m-2 float-right btn btn-primary' href="{{ route('admin.consulta.create')}}">Nueva Consulta</a>
              
              <table class="table table-head-fixed text-nowrap">

                  <thead>

                    <tr>

                      <th>#</th>
                      <th>Apellido y Nombre</th>
                      <th>DNI</th>
                      <th>Estado</th>
                      <th>Área</th>
                      <th>Obs.</th>
                      <th  class='text-center'>Reprogramación</th> 
                      <th colspan="2"></th>

                    </tr>

                  </thead>

                  <tbody>

                  @foreach ($consultas as $consulta)

                    <tr>
                      <td> {{$consulta->id}}</td>
                      <td> {{substr($consulta->apellido.' '.$consulta->nombres,0,24)}}</td>
                      <td> {{$consulta->nrodocumento}}</td>
                      <td> {{$consulta->estado}}</td>
                      <td> {{$consulta->area}}</td>
                      <td> {{ substr($consulta->observaciones,0,10) }}</td>
                      <td  class='text-center'> {{$consulta->fecha_reprogramacion}}</td> 

                      <td> <a class='btn btn-info' href="{{ route('admin.consulta.edit',$consulta->id)}}">

                          <i class="fas fa-edit"></i>

                          </a></td>

                      <td> <a class='btn btn-danger' href="{{ route('admin.consulta.index')}}" 

                          v-on:click.prevent='deseas_eliminar({{ $consulta->id }})'

                          >

                          <i class="fas fa-trash-alt"></i>

                          </a></td>

                    </tr>

                    @endforeach

                  </tbody>

                </table>

<div style='bottom:0px;position:absolute;width:100%;'>
 
<ul class="pagination" style="padding-bottom:15px;width:200px;margin:auto;">
                  <li class="paginate_button page-item previous 
                  @if ($consultas->currentPage() === 1)
                    disabled 
                  @endif
                  " id="anterior">
                    <a href="{{$consultas->previousPageUrl()}}" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">
                      Anterior
                    </a>
                  </li>
                  <li class="paginate_button page-item active">
                      <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">
                      {{$consultas->currentPage()}}
                      </a>
                  </li>
                  <li class="paginate_button page-item next
                  @if ($consultas->currentPage() === $consultas->lastPage())
                    disabled 
                  @endif
                  " id="siguiente">
                      <a href="{{$consultas->nextPageUrl()}}" aria-controls="example2" data-dt-idx="7" 
                        tabindex="0" class="page-link">Siguiente
                      </a>
                  </li>
              </ul> 
</div>
                    

              </div>

              <!-- /.card-body -->

            </div>

            <!-- /.card -->


          </div>


        </div>
        
@endsection