<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;

use App\Prestador as Prestadores;

class Administracion extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
    
    function inicio(){
        $usuario = 'martin';
        return view('admin.inicio',compact('usuario'));

    }
    function prueba(){
        /*$user = auth()->user();    
        return view('dashboard.admin.userEditForm',compact('users','user'));*/
        /*return Prestadores::all(); */

        return Prestadores::FindorFail(7)->tipo_prestadores;
    }

}
