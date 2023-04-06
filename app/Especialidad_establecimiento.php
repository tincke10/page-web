<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad_establecimiento extends Model
{
     
    protected $table = 'especialidad_establecimientos';
    use HasFactory;

    

    protected $fillable=['id','especialidad_id','establecimiento_id'];


    public function Establecimiento()
    {
        return $this->belongsTo(Establecimiento::class,'establecimiento_id');
    }
 
    public function especialidad(){
        return $this->belongsTo(Especialidad::class,'especialidad_id');
    }
 
     

}
