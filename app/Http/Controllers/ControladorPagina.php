<?php

namespace App\Http\Controllers;
use App\Provincia;
use App\Localidad;
use App\Especialidad;
use App\Establecimiento;
use App\Plan;
use App\Consulta as Reclamo;
use App\ConsultaLog;
use App\Mail\Consulta;
use Illuminate\Support\Facades\Mail;  
use Illuminate\Http\Request;
use Inertia\Inertia;
class ControladorPagina extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function formulario_consulta(){ 

        $prov  =  new Provincia();
        $provincias =  $prov->all()->sortBy('nombre');

        $localidades = $prov::find(6)->localidades;
 
        return view('web.consulta',compact('localidades','provincias'));
    }

    
    public function getLocalidades(Request $request)
    {
        $loc = new Localidad();
        $localidades = $loc::where('provincia_id',$request->provincia_id)->get();
        return $localidades;
    }

    
    public function enviar_consulta(Request $request){ 
        $request->flash();
        $loc = new Localidad();

        $nombres = $request->nombres;  
        $apellido = $request->apellido; 
        $provincia = $request->provincia;
        $localidad = $request->localidad; 
        $email = $request->email;
        $nrodocumento = $request->nrodocumento;
        $prefjo = $request->prefijo;
        $telefono = $request->telefono; 
        $consulta = $request->consulta; 
          
 
        
        
        $mensaje_enviar = $request->validate([
            'nombres'=> 'required',
            'apellido'=> 'required', 
            'localidad'=> 'required', 
            'email'=> 'required|email',
            'nrodocumento'=> 'required',
            'prefijo'=> 'required',
            'telefono'=> 'required',
            'consulta'=> 'required',
            'g-recaptcha-response' => 'recaptcha'
        ]); 
         

 
        $prov  =  new Provincia();
 
        $mensaje_enviar["nombre_localidad"]=$loc::find($localidad)->nombre;
        $mensaje_enviar["nombre_provincia"]=$prov::find($provincia)->nombre; 


        $consulta_crear = $request->validate([
            'nombres'=> 'required',
            'apellido'=> 'required', 
            'email'=> 'required|email',
            'nrodocumento'=> 'required',
            'prefijo'=> 'required',
            'telefono'=> 'required',
            'consulta'=> 'required',
        ]);
        $consulta_crear["localidad"]=$loc::find($localidad)->nombre;
        $consulta_crear["estado"]='ABIERTO';
        $consulta_crear["area"]='NINGUNA';
        $consulta_crear["medio"]='WEB';

        

        $consulta = Reclamo::create($consulta_crear);
        
        ConsultaLog::create([  
            'estado' => 'ABIERTO', 
            'area' => 'NINGUNA', 
            'consulta_id' => $consulta->id
        ]); 
         
        
        /*
        $prov  =  new Provincia();
        $provincias =  $prov->all()->sortBy('nombre');*/

        // Enviar el email, el metodo send envia un MAILABLE que es una clase de laravel para armar un email

        Mail::to('info@ammasalud.com.ar')->send(new Consulta($mensaje_enviar));
        //Mail::to('joseignaciomartin@gmail.com')->send(new Consulta($mensaje_enviar));

         

        //return view('emails.consulta',compact('mensaje_enviar'));
        //return $mensaje_enviar;
        return view ('web.consulta_enviado'); 

    }

    public function plan($plan){
        switch($plan){
            case "plan_superior":
                $nombre_plan = 'superior';
                $imagen_plan = '/imgs/plansuperior.jpg'; 

                $consultas = 'Por mes 3 consultas. Con coseguro. ';
                $consultas_domiciliarias = 'Con coseguro. ';
                $practicas_bioquimicas = 'Con coseguro.';
                $practicas_bioquimicas_no_nomencladas = 'Cobertura del 90% de las prácticas. <br>Con coseguro.';
                $practicas_diagnostico = 'Con coseguro (*).';
                $fonoaudiologia = 'Cobertura de 30 sesiones al año. Con coseguro (*).';
                $fisioterapia = 'Cobertura de 40 sesiones al año. Con coseguro (*).';
                $material_reactivo_ambulatorio = 'Cobertura del 100%.';

                $medicamentos_ambulatorios = 'Cobertura del 60% de vademecum. <br/>
                Cobertura del 80% en genéricos.';
                $medicamentos_internacion = 'Cobertura del 100%.';

                $internacion_clinica_quirurgica = 'Cobertura del 100% en habitación compartida.<br/>Habitación privada, por reintegro.';
                $intervenciones_quirurgicas = 'Cobertura del 100%.';
                $internacion_psiquiatrica = 'Cobertura del 100%, hasta 35 días por año.';
                $material_radioactivo = 'Cobertura del 100%.';
                $cirugias_video = 'Cobertura del 20%. Con coseguro.';
                
                $protesis_internas = 'Cobertura del 100%.';
                $protesis_externas = 'Cobertura del 60%.';
                $ortopedia = 'Cobertura del 70% de soporte plantares.<br/>Cobertura del 70% en calzado ortopédico. Un par al año, por reintegro.';
                $audifonos = 'Cobertura del 100%, hasta 15 años de edad.<br/>Mayor de 15 años, 1 por año. <br/>Por reintegro.'; 
                
                $psicologia = 'Cobertura de 40 sesiones al año.<br/>Con coseguro (*).';
                $psiquiatria = 'Cobertura de 40 sesiones al año.<br/>Con coseguro (*).';
                $psicopedagogia = 'Cobertura de 40 sesiones al año. <br/>Con coseguro (*).';



                $odontologia = 'Cobertura de 4 prestaciones por mes. <br/>Con coseguro (*). <br/>Financiación en ortodoncia e implantes.';
                $odontologia_consultas = 'Cobertura del 100%';
                $odontologia_protesis = 'Cobertura del 50%. Por reintegro a valores de OSTAMMA.';
                $odontologia_implantes = 'Cobertura del 50%. Por reintegro a valores de OSTAMMA';
                $odontologia_ortodoncia= 'Cobertura del 50%. Por reintegro a valores de OSTAMMA';
                


                $lentes_comunes ='Descuento del 30% adicional sobre el saldo a cargo del beneficiario.';
                $lentes_organicos = 'Descuento del 30% adicional sobre el saldo a cargo del beneficiario.';
                $lentes_bifocales = 'Descuento del 30% adicional sobre el saldo a cargo del beneficiario.';
                $cirugia_refractaria_laser =  'Una por año. Por reintegro.';
                $cirugia_refractaria_intraocular =  'Una por año. Por reintegro.';

                $nutricion = 'Con coseguro (*).';

                $observaciones  = '(*) El valor del coseguro es menor que el de otros planes.';

            break;
            case "plan_clasico":
                $nombre_plan = 'clasico';
                $imagen_plan = '/imgs/planclasico.jpg';  

                $consultas = 'Por mes 2 consultas. Con coseguro. ';
                $consultas_domiciliarias = '';
                $practicas_bioquimicas = 'Con coseguro.';
                $practicas_bioquimicas_no_nomencladas = '';
                $practicas_diagnostico = 'Con coseguro.';
                $fonoaudiologia = 'Cobertura de 25 sesiones al año. Con coseguro.';
                $fisioterapia = 'Cobertura de 25 sesiones al año. Con coseguro.';
                $material_reactivo_ambulatorio = '';

                $medicamentos_ambulatorios = 'Cobertura del 40% de vademecum. <br/>
                Cobertura del 60% en genéricos.';
                $medicamentos_internacion = 'Cobertura del 100%.';

                $internacion_clinica_quirurgica = 'Cobertura del 100% en habitación compartida.';
                $intervenciones_quirurgicas = 'Cobertura del 100%.';
                $internacion_psiquiatrica = 'Cobertura del 100%, hasta 30 días por año.';
                $material_radioactivo = 'Cobertura del 100%.';
                $cirugias_video = '';
                
                $protesis_internas = 'Cobertura del 100%.';
                $protesis_externas = 'Cobertura del 50%.';
                $ortopedia = 'Cobertura del 50% de soporte plantares.<br/>Cobertura de un par al año, por reintegro.';
                $audifonos = 'Cobertura del 100%, hasta 15 años de edad.<br/>Mayor de 15 años.'; 
                
                $psicologia = 'Cobertura de 30 sesiones al año.<br/>Con coseguro.';
                $psiquiatria = 'Cobertura de 30 sesiones al año.<br/>Con coseguro.';
                $psicopedagogia = 'Cobertura de 30 sesiones al año. <br/>Con coseguro.';

                $odontologia = 'Cobertura de 2 prestaciones por mes. <br/>Con coseguro. ';
                $odontologia_protesis = '';
                $odontologia_implantes = '';

                $lentes_comunes ='Cobertura del 80%.';
                $lentes_organicos = 'Cobertura del 80%.';
                $lentes_bifocales = 'Cobertura del 60%.';
                $cirugia_refractaria_laser =  '';
                $cirugia_refractaria_intraocular =  '';

                $nutricion = 'Con coseguro .';

                $observaciones  = '';

            break;
            case "plan_joven":
                $nombre_plan = 'joven';
                $imagen_plan = '/imgs/planjoven.jpg';

                $consultas = 'Por mes 2 consultas. Con coseguro. ';
                $consultas_domiciliarias ='';
                $practicas_bioquimicas = 'Con coseguro.';
                $practicas_bioquimicas_no_nomencladas = '';
                $practicas_diagnostico = 'Con coseguro.';
                $fonoaudiologia = 'Cobertura de 25 sesiones al año. Con coseguro.';
                $fisioterapia = 'Cobertura de 25 sesiones al año. Con coseguro.';
                $material_reactivo_ambulatorio ='';

                $medicamentos_ambulatorios = 'Cobertura del 40% de vademecum. <br/>
                Cobertura del 60% en genéricos.';
                $medicamentos_internacion = 'Cobertura del 100%.';

                $internacion_clinica_quirurgica = 'Cobertura del 100%.<br/>Habitación compartida.';
                $intervenciones_quirurgicas = 'Cobertura del 100%.';
                $internacion_psiquiatrica = 'Cobertura del 100%, hasta 30 días por año.';
                $material_radioactivo = 'Cobertura del 100%.';
                $cirugias_video = '';

                $protesis_internas = 'Cobertura del 100%.';
                $protesis_externas = 'Cobertura del 50%.';
                $ortopedia = 'Cobertura del 50% de soporte plantares.<br/>Cobertura de un par al año, por reintegro.';
                $audifonos = 'Cobertura del 100%, hasta 15 años de edad.'; 
                $psicologia = 'Cobertura de 30 sesiones al año.<br/>Con coseguro.';
                $psiquiatria = 'Cobertura de 30 sesiones al año.<br/>Con coseguro.';
                $psicopedagogia = 'Cobertura de 30 sesiones al año. <br/>Con coseguro.';

                $odontologia = 'Cobertura de 2 prestaciones por mes. <br/>Con coseguro';
                $odontologia_protesis = '';
                $odontologia_implantes = '';
                
                $lentes_comunes ='Cobertura del 80%.';
                $lentes_organicos = 'Cobertura del 80%.';
                $lentes_bifocales = 'Cobertura del 60%.';
                $cirugia_refractaria_laser =  '';
                $cirugia_refractaria_intraocular =  '';

                $nutricion = 'Con coseguro';

                $observaciones  = '(*) El PLAN JOVEN ofrece cobertura a personas de 18 a 30 años. Soltera/o sin hijos. En relación de dependencia o monotributista.';

            break;
            default:
                $nombre_plan = 'superior';
                $imagen_plan = '/imgs/plansuperior.jpg'; 

                $consultas = 'Por mes 3 consultas. Con coseguro. ';
                $consultas_domiciliarias = 'Con coseguro. ';
                $practicas_bioquimicas = 'Con coseguro.';
                $practicas_bioquimicas_no_nomencladas = 'Cobertura del 90% de las prácticas. <br>Con coseguro.';
                $practicas_diagnostico = 'Con coseguro (*).';
                $fonoaudiologia = 'Cobertura de 30 sesiones al año. Con coseguro (*).';
                $fisioterapia = 'Cobertura de 40 sesiones al año. Con coseguro (*).';
                $material_reactivo_ambulatorio = 'Cobertura del 100%.';

                $medicamentos_ambulatorios = 'Cobertura del 60% de vademecum. <br/>
                Cobertura del 80% en genéricos.';
                $medicamentos_internacion = 'Cobertura del 100%.';

                $internacion_clinica_quirurgica = 'Cobertura del 100% en habitación compartida.<br/>Habitación privada, por reintegro.';
                $intervenciones_quirurgicas = 'Cobertura del 100%.';
                $internacion_psiquiatrica = 'Cobertura del 100%, hasta 35 días por año.';
                $material_radioactivo = 'Cobertura del 100%.';
                $cirugias_video = 'Cobertura del 20%. Con coseguro.';
                
                $protesis_internas = 'Cobertura del 100%.';
                $protesis_externas = 'Cobertura del 60%.';
                $ortopedia = 'Cobertura del 70% de soporte plantares.<br/>Cobertura del 100% en calzado ortopédico. Un par al año, por reintegro.';
                $audifonos = 'Cobertura del 100%, hasta 15 años de edad.<br/>Mayor de 15 años, 1 por año. <br/>Por reintegro.'; 
                
                $psicologia = 'Cobertura de 40 sesiones al año.<br/>Con coseguro (*).';
                $psiquiatria = 'Cobertura de 40 sesiones al año.<br/>Con coseguro (*).';
                $psicopedagogia = 'Cobertura de 40 sesiones al año. <br/>Con coseguro (*).';

                $odontologia = 'Cobertura de 4 prestaciones por mes. <br/>Con coseguro (*). <br/>Financiación en ortodoncia e implantes.';
                $odontologia_protesis = 'Cobertura del 50%. Dos prácticas al mes. Por reintegro.';
                $odontologia_implantes = 'Cobertura de 2 implantes al año. Por reintegro.';

                $lentes_comunes ='Cobertura del 100%.';
                $lentes_organicos = 'Cobertura del 100%.';
                $lentes_bifocales = 'Cobertura del 80%.';
                $cirugia_refractaria_laser =  'Una por año. Por reintegro.';
                $cirugia_refractaria_intraocular =  'Una por año. Por reintegro.';

                $nutricion = 'Con coseguro (*).';

                $observaciones  = '(*) El valor del coseguro es menor que el de otros planes.';

            break;

        }

        return view('web.plan', compact('nombre_plan','imagen_plan','consultas',
                    'practicas_bioquimicas','practicas_diagnostico','fonoaudiologia','fisioterapia',
                    'medicamentos_ambulatorios','medicamentos_internacion','internacion_clinica_quirurgica',
                    'intervenciones_quirurgicas','internacion_psiquiatrica','material_radioactivo',
                    'protesis_internas','protesis_externas','ortopedia','audifonos', 'psicologia',
                    'psiquiatria','psicopedagogia','odontologia', 'lentes_comunes','lentes_organicos','lentes_bifocales',
                    'nutricion','observaciones','consultas_domiciliarias','practicas_bioquimicas_no_nomencladas',
                    'material_reactivo_ambulatorio','cirugias_video','odontologia_consultas','odontologia_protesis',
                    'odontologia_implantes','odontologia_ortodoncia',
                    'cirugia_refractaria_laser','cirugia_refractaria_intraocular'
                ));
    }


    
    

    public function prestadores(Request $request)
    {
        $est = new Establecimiento();

        // LAS LOCALIDADES QUE TIENEN ESTABLECIMIENTOS
        $localidades_establecimientos = $est::select('localidad_id')->distinct()->get(); 
        $loc = new Localidad();
        $localidades = $loc::whereIn('id', $localidades_establecimientos)->get();
        // PLANES DE OSTAMMA
        $plan = new Plan();
        $planes = $plan::where('entidad_id','1')->get();
        // ESPECIALIDADES
        $esp = new Especialidad();
        $especialidades = $esp::orderBy('nombre')->get();

        // VARIABLES DEL FORMULARIO
        $plan =$request->plan; 
        $localidad =$request->localidad; 
        $especialidad =$request->especialidad; 

        // NUEVO LISTADO DE ESTABLECIMIENTOS DE PRESTADORES (CON SCOPES QUE ESTAN EN EL MODELO)
        
        $establecimientos_seleccionados = $est->enlocalidad($localidad)
                ->enplan($plan)
                ->conespecialidad($especialidad)
                ->orderBy('nombre')
                ->paginate(10)->withQueryString();
        return view ('web.prestadores',compact('localidades','planes','especialidades','establecimientos_seleccionados','localidad','especialidad','plan')); 

    }

  
    

 
}
