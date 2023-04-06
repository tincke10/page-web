<div class="card card-info">

    <div class="card-header">

    <h3 class="card-title">Nueva especialidad</h3>

    </div> 
    <!-- /.card-header -->

    <div class="card-body">

        
        @if($updateMode)
            @include('livewire.update')
        @else
            @include('livewire.create')
        @endif
        
        

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
            @forelse ($data as $item)
                <tr>
                    <th scope="row"> 
                        {{ $item->matricula }}
                    </th>
                    <td> 
                        {{ $item->especialidad->nombre }}
                    </td>
                    <td>
                        {{ $item->tipo_prestadores->nombre }}
                    </td>
                    <td> 
                    <a wire:click="edit({{ $item->id }})" class="px-2 py-1 bg-blue-200 text-blue-500 hover:bg-blue-500 hover:text-white rounded">
                        <i class="far fa-edit"></i>
                    </a>
                    <a wire:click="destroy({{ $item->id }})" class="px-2 py-1 bg-red-200 text-red-500 hover:bg-red-500 hover:text-white rounded">
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
    </div>
</div>


