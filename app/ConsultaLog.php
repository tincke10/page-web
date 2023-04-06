<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultaLog extends Model
{
    use HasFactory;
    protected $fillable=['consulta_id','estado','observaciones','area','fecha_reprogramacion']; 
}
