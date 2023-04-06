<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Plan;
use App\Establecimientos_planes;
use App\Entidad; 
use App\Establecimiento;

class AdminPlanController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    { 
        $nombre = $request->get('nombre'); 
        $planes = Plan::with('entidad')->where('nombre','like',"%$nombre%")->orderBy('nombre')->paginate(5); 
        return view('admin.plan.index',compact('planes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $entidades = Entidad::orderBy('nombre')->get();    
           
        return view('admin.plan.create',compact('entidades'));
   

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $request->validate([ 
            'nombre' => 'required'
        ]);
   
        $plan = Plan::create([ 
            'nombre' => $request['nombre'],  
            'slug' => $request['slug'],  
            'entidad_id' => $request['entidad']  
            
        ]); 
 


        $entidades = Entidad::orderBy('nombre')->get();    

 

        $datos='Se han cargado los datos del plan';
        $editar = "Si";
        return view('admin.plan.edit',compact('entidades','plan','datos','editar'));
                
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $entidades = Entidad::orderBy('nombre')->get();    

        $plan = Plan::with('entidad')->where('id',$id)->firstOrFail();
        
        $editar ='si';

        //return $localidades;
        return view('admin.plan.edit', compact('entidades','plan','editar'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required', 
        ]);

         
 
        
        $persona = Persona::findOrFail($id);
 
         
        $persona->apellido = $request->apellido;
        $persona->nombres = $request->nombres;
        $persona->nacimiento = $request->nacimiento; 
        $persona->calle = $request->calle;
        $persona->numero = $request->numero;
        $persona->piso = $request->piso;
        $persona->depto = $request->depto;
        $persona->telefono = $request->telefono;
        $persona->cuit = $request->cuit;
        $persona->localidad_id = $request->localidad;
        

        $prov  =  new Provincia();
        $provincias =  $prov->all()->sortBy('nombre');

        $localidades = $prov::find(6)->localidades; 

 
        $persona->save();

        $datos='Se han cargado los datos de la persona';
        $editar = "Si";
        return view('admin.prestador.edit',compact('persona','datos','editar','provincias','localidades'));
    //return $persona;
       /* return view('admin.prestador.edit',compact('persona','datos','editar','provincias','localidades'));
        return view('admin/prestador/prestaciones', compact('persona'));*/
 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = Plan::findOrFail($id); 
        $plan->delete();
        return redirect()->route('admin.plan.index')->with('datos','Registro eliminado correctamente');
    }

    public function establecimientos($plan_id)
    {
        
        
        $plan= new Plan();
        $plan = Plan::with('establecimientos')->where('id',$plan_id)->firstOrFail();

        return view('admin/plan/establecimientos', compact('plan'));


    }
    public function nuevoestablecimiento($plan_id)
    {
        $plan= new Plan();
        $plan = Plan::findOrFail($plan_id);
        
        $establecimientos  =  new Establecimiento();
        $establecimientos =  $establecimientos->all()->sortBy('nombre'); 

        return view('admin/plan/nuevoestablecimiento', compact('establecimientos','plan'));


    }


    public function agregarestablecimiento(Request $request, $plan_id)
    {
        
        $request->validate([ 
        'detalle' => 'required'
        ]);


        $establecimiento_plan = Establecimientos_planes::create([
            'plan_id' =>$plan_id,  
            'habilitado' =>1,
            'establecimiento_id' => $request->establecimiento, 
            'detalle'=> $request->detalle
            
        ]);
         
        $plan = Plan::where('id',$plan_id)->firstOrFail();
        
        $establecimientos  =  new Establecimiento();
        $establecimientos =  $establecimientos->all()->sortBy('nombre'); 
        
        $datos='Se han cargado los datos del establecimiento';

        return view('admin.plan.establecimientos', compact('establecimientos','plan','datos'));

    }

    public function eliminarestablecimiento($id)
    {
    
        $est = Establecimientos_planes::findOrFail($id); 

        
        $plan_id = $est->plan_id;
        
        $est->delete();

        $plan = Plan::where('id',$plan_id)->firstOrFail();
        
        $establecimientos  =  new Establecimiento();
        $establecimientos =  $establecimientos->all()->sortBy('nombre'); 
        
        $datos='Eliminado correctamente';

        return view('admin.plan.establecimientos', compact('establecimientos','plan','datos'));
    }
}
