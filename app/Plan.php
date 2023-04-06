<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'planes';
    use HasFactory;

    

    protected $fillable=['id','nombre', 'slug','entidad_id']; 

    
    public function entidad(){
        return $this->belongsTo(Entidad::class,'entidad_id');
    }
 
    public function establecimientos(){
        return $this->hasMany(Establecimientos_planes::class,'plan_id');
    }

}
