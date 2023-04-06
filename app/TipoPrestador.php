<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPrestador extends Model
{
    protected $table = 'tipo_prestadores';
    use HasFactory;
 
    
    public function prestadores(){
        return $this->hasmany(Prestador::class);
    }
}
