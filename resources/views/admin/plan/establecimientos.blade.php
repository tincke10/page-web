@extends ('layouts.admin')

@section('titulo',''.$plan->nombre)

@section('breadcrumb')

  <li class="breadcrumb-item"><a href="{{route('admin.plan.index')}}">Planes</a></li>

  <li class="breadcrumb-item active">@yield('titulo')</li>

@endsection

@section('contenido')



<style>
  .nav-tabs .nav-link {
    color:white;
    border:none;
  }
</style> 
<div  id='confirmareliminar'>

<span style='display:none;' id='URLbase'>/admin/plan/eliminarestablecimiento</span>

@include('custom.modal_eliminar')

  <div class="card">      
      <div class="card-header">
            <h3 class="card-title">Administración de establecimientos</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            <!--<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>-->
            </div>
          </div> 
      <div class="card-body"> 
          
          
          
      <a href="/admin/plan/{{ $plan->id }}/nuevoestablecimiento">
          <div class="btn btn-success"> <i class="fas fa-plus-circle"></i> &nbsp;Agregar establecimiento </div>
          </a> <br> <br>
          <table class="table">
              <thead>
              <tr> 
                  <th scope="col">Establecimiento</th> 
                  <th scope="col"></th>
              </tr>
              </thead>
              <tbody> 
              @forelse ($plan->establecimientos as $est)
                  <tr> 
                      <td> 
                          {{ $est->establecimiento->nombre }}
                      </td>
                       
                      <td> 
                      <!--
                      <a wire:click="edit({{ $est->id }})" class="px-2 py-1 bg-blue-200 text-blue-500 hover:bg-blue-500 hover:text-white rounded">
                          <i class="far fa-edit"></i>
                      </a>-->
                      <a class='btn btn-danger' href="{{ route('admin.plan.eliminarestablecimiento',1)}}" 
                      v-on:click.prevent='deseas_eliminar({{ $est->id }})' 
                      >

                      <i class="fas fa-trash-alt"></i>

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
          
          
      </div> <!-- Final del cuerpo de la tarjeta -->
      <div class="card-footer"> 
        <a href="{{ route('admin.plan.edit',$plan->id)}}" class='btn btn-danger'>Volver</a> 
        
      </div> 
      
    </div>  

</div>

@endsection