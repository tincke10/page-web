<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    //
    protected $table = "localidades"; 

    public function provincia()
    {
        return $this->belongsTo('App\Provincia');
    }
    
}
