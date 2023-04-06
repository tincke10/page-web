<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Prestacion;
use App\Persona;
use App\Plan;
use App\Especialidad;
use App\Establecimiento;
use App\Espe_esta;
use App\TipoEstablecimiento;
use App\Provincia;
use App\Localidad;

class AdminEstablecimientoController extends Controller
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
        // dd($nombre);
        $establecimientos = Establecimiento::with('tipo_establecimiento','localidad')->where('nombre','like',"%$nombre%")->orderBy('nombre')->paginate(10);
        //$prestadores = Prestacion::with('especialidad')->get();
        //return $prestadores;
        return view('admin.establecimiento.index',compact('establecimientos','nombre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $tiposestablecimientos = TipoEstablecimiento::orderBy('nombre')->get();    
         
        $prov  =  new Provincia();
        $provincias =  $prov->all()->sortBy('nombre');

        $localidades = $prov::find(6)->localidades; 

 

        $localidad = 1271;
        
        return view('admin.establecimiento.create',compact('tiposestablecimientos', 'localidades','provincias','localidad'));
   

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
            'nombre' => 'required',
            
        ]);


        $establecimiento = Establecimiento::create([ 
            'nombre' => $request['nombre'],  
            'telefono' => $request['telefono'],
            'email' => $request['email'],
            'calle' => $request['calle'],
            'numero' => $request['numero'],
            'piso' => $request['piso'],
            'depto' => $request['depto'], 
            'cuit' => $request['cuit'],
            'localidad_id' => $request['localidad'], 
            'tipo_establecimiento_id' => $request['tipoestablecimiento']  
            
        ]); 

        $prov  =  new Provincia();
        $provincias =  $prov->all()->sortBy('nombre');

        $localidades = $prov::find(6)->localidades; 


        $tiposestablecimientos = TipoEstablecimiento::orderBy('nombre')->get();    

 

        $datos='Se han cargado los datos del establecimiento';
        $editar = "Si";
        return view('admin.establecimiento.edit',compact('tiposestablecimientos','establecimiento','datos','editar','provincias','localidades'));
                
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
        
        $tiposestablecimientos = TipoEstablecimiento::orderBy('nombre')->get();    

        $establecimiento = Establecimiento::with('tipo_establecimiento','localidad')->where('id',$id)->firstOrFail();
        
        $prov  =  new Provincia();
        $provincias =  $prov->all()->sortBy('nombre');

        $localidades = $prov::find($establecimiento->localidad->provincia_id)->localidades; 
        $editar ='si';

        //return $localidades;
        return view('admin.establecimiento.edit', compact('tiposestablecimientos','localidades','provincias','establecimiento','editar'));

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
        $establecimiento = Establecimiento::findOrFail($id);
 
        $request->validate([ 
            'nombre' => 'required',
            
        ]);
   

        
        $establecimiento->nombre = $request->nombre;
        $establecimiento->telefono = $request->telefono;
        $establecimiento->email = $request->email;
        $establecimiento->calle = $request->calle;
        $establecimiento->numero = $request->numero;
        $establecimiento->piso = $request->piso;
        $establecimiento->cuit = $request->cuit;
        $establecimiento->depto = $request->depto;
        $establecimiento->cuit = $request->cuit;
        $establecimiento->localidad_id = $request->localidad;
        $establecimiento->tipo_establecimiento_id = $request->tipoestablecimiento;

   
         
        $establecimiento->save();
          

        $prov  =  new Provincia();
        $provincias =  $prov->all()->sortBy('nombre');

        $localidades = $prov::find(6)->localidades; 


        $tiposestablecimientos = TipoEstablecimiento::orderBy('nombre')->get();    

 

        $datos='Se han cargado los datos del establecimiento';
        $editar = "Si";
        return view('admin.establecimiento.edit',compact('tiposestablecimientos','establecimiento','datos','editar','provincias','localidades'));
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $est = Establecimiento::findOrFail($id);  
         
        $est->delete();

        return redirect()->route('admin.establecimiento.index')->with('datos','Registro eliminado correctamente');
    }

    public function especialidades($establecimiento_id)
    {
        
        
        $establecimiento= new Establecimiento();
        $establecimiento = Establecimiento::with('especialidades')->where('id',$establecimiento_id)->firstOrFail();

        return view('admin/establecimiento/especialidades', compact('establecimiento'));


    }
    public function nuevaespecialidad($establecimiento_id)
    {
        $establecimiento= new Establecimiento();
        $establecimiento = Establecimiento::findOrFail($establecimiento_id);
        
        $especialidades  =  new Especialidad();
        $especialidades =  $especialidades->all()->sortBy('nombre'); 

        
        $planes = Plan::orderBy('nombre')->get(); 

        return view('admin/establecimiento/nuevaespecialidad', compact('especialidades','establecimiento','planes'));


    }


    public function agregarespecialidad(Request $request, $establecimiento_id)
    {
        $espe_esta = Espe_esta::create([
            'establecimiento_id' =>$establecimiento_id,  
            'especialidad_id' => $request->especialidad, 
            
        ]);
         
        $establecimiento = Establecimiento::where('id',$establecimiento_id)->firstOrFail();
        
        $especialidades  =  new Especialidad();
        $especialidades =  $especialidades->all()->sortBy('nombre'); 

        
        if($request->get('planes')){
            $espe_esta->planes()->sync($request->get('planes'));
        }
        
        $datos='Se han cargado los datos del establecimiento';

        return view('admin.establecimiento.especialidades', compact('especialidades','establecimiento','datos'));

    }

    public function eliminarespecialidad($id)
    {
    
        $esp = Espe_esta::findOrFail($id); 

        
        $establecimiento_id = $esp->establecimiento_id;

        $establecimiento = Establecimiento::where('id',$establecimiento_id)->firstOrFail();
            
        $especialidades  =  new Especialidad();
        $especialidades =  $especialidades->all()->sortBy('nombre'); 
        
        $esp->delete();

        $datos = 'Registro eliminado correctamente';
        return view('admin.establecimiento.especialidades',compact('especialidades','establecimiento','datos'));
        
    }
}
