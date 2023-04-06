@extends ('layouts.admin')


@section('titulo','Administración de Categorías')

@section('breadcrumb')

<li class="breadcrumb-item active">@yield('titulo')</li>

@endsection

@section('contenido')

 

<div class="row" id='confirmareliminar'>

<span style='display:none;' id='URLbase'>{{route('admin.category.index')}}</span>

@include('custom.modal_eliminar')

          <div class="col-12">

            <div class="card">

            

            

              <div class="card-header">

                <h3 class="card-title">Sección de categorías</h3>



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

               

              <a class='m-2 float-right btn btn-primary' href="{{ route('admin.category.create')}}">Nueva Categoría</a>

              

              <table class="table table-head-fixed text-nowrap">

                  <thead>

                    <tr>

                      <th>ID</th>

                      <th>Nombre</th>

                      <th>Slug</th>

                      <th>Descripción</th>

                      <th>Fecha creación</th>

                      <th>Fecha modificación</th>

                      <th colspan="3"></th>

                    </tr>

                  </thead>

                  <tbody>

                  @foreach ($categorias as $categoria)

                   

                    <tr>

                      <td> {{$categoria->id}}</td>

                      <td> {{$categoria->nombre}}</td>

                      <td> {{$categoria->slug}}</td>

                      <td style ="max-width:300px;overflow:hidden;"> {{$categoria->descripcion}}</td>

                      <td> {{$categoria->created_at}}</td>

                      <td> {{$categoria->updated_at}}</td>

                      <td> <a class='btn btn-default' href="{{ route('admin.category.show',$categoria->slug)}}">

                          <i class="fas fa-eye"></i>

                          </a></td>

                      <td> <a class='btn btn-info' href="{{ route('admin.category.edit',$categoria->slug)}}">

                          <i class="fas fa-edit"></i>

                          </a></td>

                      <td> <a class='btn btn-danger' href="{{ route('admin.category.index')}}" 

                          v-on:click.prevent='deseas_eliminar({{ $categoria->id }})'

                          >

                          <i class="fas fa-trash-alt"></i>

                          </a></td>

                    </tr>

                    @endforeach

                  </tbody>

                </table>

              </div>

              <!-- /.card-body -->

            </div>

            <!-- /.card -->

          </div>

        </div>





  

        {{ $categorias->appends($_GET)->links()}} 

@endsection