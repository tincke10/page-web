<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;
    
    protected $fillable=['apellido','nombres','nrodocumento','consulta','localidad','estado','observaciones','email','prefijo','telefono','area','fecha_reprogramacion','medio'];

    public function historial(){
        return $this->hasMany(ConsultaLog::class,'consulta_id');
    }
}
