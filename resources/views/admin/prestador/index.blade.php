@extends ('layouts.admin')

@section('titulo','Administración de Prestadores')

@section('breadcrumb')

<li class="breadcrumb-item active">@yield('titulo')</li>

@endsection

@section('contenido')

 

<div class="row" id='confirmareliminar'>

<span style='display:none;' id='URLbase'>{{route('admin.prestador.index')}}</span>

@include('custom.modal_eliminar')

          <div class="col-12">

            <div class="card">

            

            

              <div class="card-header">

                <h3 class="card-title">Sección de Prestadores</h3>



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

              @include('custom.mensaje')
              

              <a class='m-2 float-right btn btn-primary' href="{{ route('admin.prestador.create')}}">Nuevo Prestador</a>


              <table class="table table-head-fixed text-nowrap table-hover">

                  <thead>

                    <tr>

                      <th>CUIT</th>

                      <th>Apellido y Nombre</th>

                      <th>Prestaciones</th> 

                      <th>Fecha creación</th> 


                      <th colspan="3"></th>

                    </tr>

                  </thead>

                  <tbody>

                  @foreach ($prestadores as $prestador)

                   

                    <tr>

                      <td> {{$prestador->cuit}}</td>

                      <td> {{$prestador->apellido}} {{$prestador->nombres}}</td>
 

                      <td style ="max-width:300px;overflow:hidden;">
                    
                      
                  @foreach($prestador->prestaciones as $pres)
                    @if ($loop->first)
                    @else
                    ,
                    @endif
                    {{$pres->especialidad->nombre}} 
                    
                  @endforeach
                       </td>

                      <td> {{$prestador->updated_at}}</td>

                      <td> <a class='btn btn-default' href="{{ route('admin.prestador.show',$prestador->id)}}">

                          <i class="fas fa-eye"></i>

                          </a></td>

                      <td> <a class='btn btn-info' href="{{ route('admin.prestador.edit',$prestador->id)}}">

                          <i class="fas fa-edit"></i>

                          </a></td>

                      <td> <a class='btn btn-danger' href="{{ route('admin.prestador.index')}}" 

                          v-on:click.prevent='deseas_eliminar({{ $prestador->id }})'

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
                                @if ($prestadores->currentPage() === 1)
                                  disabled 
                                @endif
                                " id="anterior">
                                  <a href="{{$prestadores->previousPageUrl()}}" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">
                                    Anterior
                                  </a>
                                </li>
                                <li class="paginate_button page-item active">
                                    <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">
                                    {{$prestadores->currentPage()}}
                                    </a>
                                </li>
                                <li class="paginate_button page-item next
                                @if ($prestadores->currentPage() === $prestadores->lastPage())
                                  disabled 
                                @endif
                                " id="siguiente">
                                    <a href="{{$prestadores->nextPageUrl()}}" aria-controls="example2" data-dt-idx="7" 
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