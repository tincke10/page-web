<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    use HasFactory;

       
    protected $fillable=['cuit','nombre','localidad_id','tipo_establecimiento_id','telefono','email','calle','numero','piso','depto'];

    public function localidad(){
        return $this->belongsTo(Localidad::class,'localidad_id');
    }

    public function tipo_establecimiento(){
        return $this->belongsTo(TipoEstablecimiento::class,'tipo_establecimiento_id');
    }
     
    public function especialidades(){
        return $this->hasMany(Espe_esta::class,'establecimiento_id');
    }

    public function planes(){
        return $this->hasMany(Establecimientos_planes::class,'establecimiento_id');
    }

    // SCOPES

    public function scopeEnplan($query,$plan){
        if($plan!=0){
            return $query->join('establecimientos_planes', 'establecimientos_planes.establecimiento_id', '=', 'establecimientos.id')
            ->where('establecimientos_planes.plan_id',$plan);
        }
    } 

    public function scopeEnlocalidad($query,$localidad){
        if($localidad!=0){
            return $query->where('localidad_id',$localidad);
        }
    }

    public function scopeConespecialidad($query,$especialidad){
        if($especialidad!=0){
            return $query->join('especialidad_establecimientos', 'especialidad_establecimientos.establecimiento_id', '=', 'establecimientos.id')
            ->where('especialidad_establecimientos.especialidad_id',$especialidad);
        }
    }
    
    

}
