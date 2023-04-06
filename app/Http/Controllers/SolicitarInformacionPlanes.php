<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Provincia;
use App\Localidad;
use App\Mail\ConsultaPlan;
use Illuminate\Support\Facades\Mail;  

class SolicitarInformacionPlanes extends Controller
{
    public function formulario_planes($plan){ 

        if($plan=='todos'){
            $plan = 'superior';
        } 

        $prov  =  new Provincia();
        $provincias =  $prov->all()->sortBy('nombre');
 
        $localidades = $prov::find(6)->localidades;
 
        return view('web.conocerplan',compact('localidades','provincias','plan'));
    }

    public function getLocalidades(Request $request)
    {
        $loc = new Localidad();
        $localidades = $loc::where('provincia_id',$request->provincia_id)->get();
        return $localidades;
    }

    
    public function enviar_formulario(Request $request){ 
        $request->flash();
        $loc = new Localidad();

        $nombres = $request->nombres;  
        $apellido = $request->apellido;
        $sexo = $request->sexo;
        $provincia = $request->provincia;
        $localidad = $request->localidad;
        $fecha_nacimiento = $request->fecha_nacimiento;
        $email = $request->email;
        $nrodocumento = $request->nrodocumento;
        $prefjo = $request->prefijo;
        $telefono = $request->telefono;
        $plan=$request->plan;
        $conyuge = $request->conyuge;
         
        $nombre_localidad = $loc->nombre;

        $nombres_conyuge = $request->nombres_conyuge;  
        $apellido_conyuge = $request->apellido_conyuge;
        $sexo_conyuge = $request->sexo_conyuge; 
        $fecha_nacimiento_conyuge = $request->fecha_nacimiento_conyuge; 
        $nrodocumento_conyuge = $request->nrodocumento_conyuge;
        
        $hijos_menores = $request->hijos_menores;
        $hijos_mayores = $request->hijos_mayores;
 
        
        if($conyuge=='Si'){
            $mensaje_enviar = $request->validate([
                'nombres'=> 'required',
                'apellido'=> 'required',
                'sexo'=> 'required',
                'localidad'=> 'required',
                'fecha_nacimiento'=> 'required',
                'email'=> 'required|email',
                'nrodocumento'=> 'required',
                'prefijo'=> 'required',
                'telefono'=> 'required',
                'nombres_conyuge'=> 'required',
                'apellido_conyuge'=> 'required',
                'sexo_conyuge'=> 'required', 
                'fecha_nacimiento_conyuge'=> 'required', 
                'nrodocumento_conyuge'=> 'required',
                'g-recaptcha-response' => 'recaptcha'
            ]); 
        }else{
            $mensaje_enviar = $request->validate([
                'nombres'=> 'required',
                'apellido'=> 'required',
                'sexo'=> 'required',
                'localidad'=> 'required',
                'fecha_nacimiento'=> 'required',
                'email'=> 'required|email',
                'nrodocumento'=> 'required',
                'prefijo'=> 'required',
                'telefono'=> 'required',
                'g-recaptcha-response' => 'recaptcha'
            ]); 
        }

        $prov  =  new Provincia();

        //$mensaje_enviar["fecha_nacimiento"] = Carbon::createFromFormat('d-m-Y', $request->fecha_nacimiento)->toDateString();

        $mensaje_enviar["fecha_nacimiento"] = substr($fecha_nacimiento,8,2).'/'.substr($fecha_nacimiento,5,2).'/'.substr($fecha_nacimiento,0,4);
        $mensaje_enviar["fecha_nacimiento_conyuge"] = substr($fecha_nacimiento_conyuge,8,2).'/'.substr($fecha_nacimiento_conyuge,5,2).'/'.substr($fecha_nacimiento_conyuge,0,4);
        $mensaje_enviar["nombre_localidad"]=$loc::find($localidad)->nombre;
        $mensaje_enviar["nombre_provincia"]=$prov::find($provincia)->nombre;
        $mensaje_enviar["hijos_menores"]=$hijos_menores;
        $mensaje_enviar["hijos_mayores"]=$hijos_mayores;
        
        $conyuge = $conyuge ?? '' ;
        $mensaje_enviar["conyuge"]= $conyuge;
        
        /*
        $prov  =  new Provincia();
        $provincias =  $prov->all()->sortBy('nombre');*/

        // Enviar el email, el metodo send envia un MAILABLE que es una clase de laravel para armar un email

        Mail::to('info@ammasalud.com.ar')->send(new ConsultaPlan($mensaje_enviar));

         

        //return view('emails.consultaplan',compact('mensaje_enviar'));
        //return $mensaje_enviar;
        return view ('web.conocerplan_enviado'); 

    }

}
