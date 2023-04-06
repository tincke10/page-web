<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestacion extends Model
{
    protected $table = 'prestaciones';
    use HasFactory;

    

    protected $fillable=['id','matricula','especialidad_id','tipo_prestaciones_id','personas_id'];


    public function persona()
    {
        return $this->belongsTo(Persona::class,'personas_id');
    }


    public function tipo_prestacion(){
        return $this->belongsTo(TipoPrestacion::class,'tipo_prestaciones_id');
    }
 
    public function especialidad(){
        return $this->belongsTo(Especialidad::class,'especialidad_id');
    }
 
    
}
