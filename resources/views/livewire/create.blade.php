<div class="row">
  <div class="col-md-3">
      <div class="form-group">
        <label>Matricula</label>
        <input    class="form-control" wire:model="matricula"  type="text" id="matricula" name="matricula">
        @error('matricula')
              <span class="text-red-500 text-xs italic py-1">{{ $message }}</span>
        @enderror
      </div> 
    </div> 
    <div class="col-md-3">
      <div class="form-group" >
        <label>Especialidad</label>
        <select wire:model="especialidad_id"  class="form-control"  style="width: 100%;" >
          @foreach($especialidades as $especialidad)
            
              <option value="{{ $especialidad->id }}" selected="selected">{{ $especialidad->nombre }}</option>
             
              <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
             
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
      <label>Tipo Prestador</label>
        <select wire:model="tipo_prestadores_id"   class="form-control" style="width: 100%;">
        @foreach($tiposprestadores as $tipoprestador)
             
              <option value="{{ $tipoprestador->id }}">{{ $tipoprestador->nombre }}</option>
            
        @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
      
      <label>&nbsp;</label>
      <br> 
        <a wire:click="store()" class="btn btn-primary"  @click='agregarespecialidad' style='width:100%;color:white;cursor:pointer;' >
        <i class="fas fa-plus-circle"></i>&nbsp;&nbsp; Agregar especialidad
        </a>
      </div> 
    </div>
    <div class="col-md-12"> 
  </div> 
</div> 


 