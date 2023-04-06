<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'especialidades';
    use HasFactory;

    protected $fillable=['nombre','slug','descripcion'];
    
     
      
}
