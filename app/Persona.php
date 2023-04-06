<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

      
    protected $fillable=['apellido','nombres','cuit','telefono','nacimiento','calle','numero','piso','depto','localidad_id','user_id'];

    public function localidad(){
        return $this->belongsTo(Localidad::class,'localidad_id');
    }

    

    public function prestaciones(){
        return $this->hasMany(Prestacion::class,'personas_id');
    }
}
