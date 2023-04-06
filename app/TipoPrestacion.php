<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPrestacion extends Model
{
    protected $table = 'tipo_prestaciones';
    use HasFactory;
 
    
    public function prestaciones(){
        return $this->hasmany(Prestacion::class,'tipo_prestaciones_id');
    }
}
