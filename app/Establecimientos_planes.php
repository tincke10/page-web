<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establecimientos_planes extends Model
{
     
    protected $table = 'establecimientos_planes';
    use HasFactory;

    

    protected $fillable=['id','plan_id','establecimiento_id','habilitado','detalle'];


    public function establecimiento()
    {
        return $this->belongsTo(Establecimiento::class,'establecimiento_id');
    }
 
    public function plan(){
        return $this->belongsTo(Plan::class,'plan_id');
    }
 
     

}
