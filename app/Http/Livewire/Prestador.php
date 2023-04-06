<?php

namespace App\Http\Livewire;

use App\Prestador as Prestadores;
use Livewire\Component;

use App\especialidad;
use App\tipoPrestador;

class Prestador extends Component
{
    public $data, $matricula, $especialidad_id=2, $tipo_prestadores_id=4, $selected_id;
    public $updateMode = false;

    public function render()
    {
        $especialidades = Especialidad::orderBy('nombre')->get(); 
        $tiposprestadores = TipoPrestador::orderBy('nombre')->get(); 

        $this->data = Prestadores::all();
        return view('livewire.prestador',compact('especialidades','tiposprestadores'));
    }
    private function resetInput()
    {
        $this->matricula = null;
        
    }    
    
    public function store()
    {
        $this->validate([
            'matricula' => 'required|min:5',
            'especialidad_id' => 'required'
        ]);        
        
 
        Prestadores::create([
            'matricula' => $this->matricula,
            'especialidad_id' => $this->especialidad_id,
            'personas_id' => 1,
            'tipo_prestadores_id' => $this->tipo_prestadores_id
        ]);        
        $this->resetInput();
    }    
    
    public function edit($id)
    {
        $record = Prestadores::findOrFail($id);        
        $this->selected_id = $id;
        $this->matricula = $record->matricula;       
        $this->updateMode = true;
    }    
    
    
    public function update()
    {
        $this->validate([
            'matricula' => 'required|min:5'
        ]);        
              
        
        if ($this->selected_id) {
            $record = Prestadores::find($this->selected_id);
            $record->update([
                'matricula' => $this->matricula,
                'especialidad_id' => 1,
                'personas_id' => 1,
                'tipo_prestadores_id' => 1
            ]);            
            
            $this->resetInput();
            
            $this->updateMode = false;
        }    
    }    
        
    public function destroy($id)
    {
        if ($id) {
            $record = Prestadores::where('id', $id);
            $record->delete();

            $this->updateMode = false;
            if(Prestadores::count()==0){
                $this->render();
            }
        }
    }
}
