<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestador extends Model
{
    protected $table = 'prestadores';
    use HasFactory;

    

    protected $fillable=['id','matricula','especialidad_id','tipo_prestadores_id','personas_id'];


    public function persona()
    {
        return $this->belongsTo(Persona::class,'personas_id');
    }


    public function tipo_prestadores(){
        return $this ->belongsTo(TipoPrestador::class);
    }
 
    
    
}
