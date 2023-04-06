<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Plan;

class Espe_esta extends Model
{
     
    protected $table = 'espe_esta';
    use HasFactory;

    

    protected $fillable=['id','especialidad_id','establecimiento_id'];


    public function Establecimiento()
    {
        return $this->belongsTo(Establecimiento::class,'establecimiento_id');
    }
 
    public function especialidad(){
        return $this->belongsTo(Especialidad::class,'especialidad_id');
    }

    public function planes(){
        return $this->belongsToMany('App\Plan');
    }

     

}
