<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Prestacion;
use App\Persona;
use App\Especialidad;
use App\TipoPrestacion;
use App\Provincia;
use App\Localidad;

class AdminPrestadorController extends Controller
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
        $prestadores = Persona::with('prestaciones','prestaciones.especialidad','prestaciones.tipo_prestacion')->paginate(5);
        //$prestadores = Prestacion::with('especialidad')->get();
        //return $prestadores;
        return view('admin.prestador.index',compact('prestadores','nombre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $tiposprestaciones = TipoPrestacion::orderBy('nombre')->get();    
         
        $prov  =  new Provincia();
        $provincias =  $prov->all()->sortBy('nombre');

        $localidades = $prov::find(6)->localidades; 

 

        $localidad = 1271;
        
        return view('admin.prestador.create',compact('tiposprestaciones', 'localidades','provincias','localidad'));
   

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
            'apellido' => 'required',
            'nombres' => 'required', 
            'cuit' => 'required|unique:personas,cuit' 
        ]);
   
        $persona = Persona::create([
            'apellido' => $request['apellido'],
            'nombres' => $request['nombres'], 
            'nacimiento' => $request['nacimiento'], 
            'calle' => $request['calle'],
            'numero' => $request['numero'],
            'piso' => $request['piso'],
            'depto' => $request['depto'],
            'telefono' => $request['telefono'],
            'cuit' => $request['cuit'],
            'localidad_id' => $request['localidad'] 
        ]); 

        $prov  =  new Provincia();
        $provincias =  $prov->all()->sortBy('nombre');

        $localidades = $prov::find(6)->localidades; 

 

        $datos='Se han cargado los datos de la persona';
        $editar = "Si";
        return view('admin.prestador.edit',compact('persona','datos','editar','provincias','localidades'));
                
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
        $persona = Persona::with('prestaciones','prestaciones.especialidad','prestaciones.tipo_prestacion')->where('id',$id)->firstOrFail();
        
        $prov  =  new Provincia();
        $provincias =  $prov->all()->sortBy('nombre');

        $localidades = $prov::find(6)->localidades; 
        $editar ='si';

        return view('admin.Prestador.edit', compact('localidades','provincias','persona','editar'));

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
            'apellido' => 'required',
            'nombres' => 'required'
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
        $prod = Prestador::findOrFail($id); 
        $prod->delete();
        return redirect()->route('admin.Prestador.index')->with('datos','Registro eliminado correctamente');
    }

    public function prestaciones($persona_id)
    {
        
        
        $persona= new Persona();
        $persona = Persona::with('prestaciones','prestaciones.especialidad','prestaciones.tipo_prestacion')->where('id',$persona_id)->firstOrFail();

        return view('admin/prestador/prestaciones', compact('persona'));


    }
    public function nuevaprestacion($persona_id)
    {
        $persona= new Persona();
        $persona = Persona::findOrFail($persona_id);
        
        $especialidades  =  new Especialidad();
        $especialidades =  $especialidades->all()->sortBy('nombre');

        $tipo_prestacion  =  new TipoPrestacion();
        $tiposprestaciones =  $tipo_prestacion->all()->sortBy('nombre');

        return view('admin/prestador/nuevaprestacion', compact('tiposprestaciones','especialidades','persona'));


    }


    public function agregarprestacion(Request $request, $persona_id)
    {
        $prestacion= Prestacion::create([
            'personas_id' =>$persona_id, 
            'matricula' => $request->matricula,
            'tipo_prestaciones_id' => $request->tipo_prestacion,
            'especialidad_id' => $request->especialidad, 
            
        ]);
         
        $persona = Persona::where('id',$persona_id)->firstOrFail();
        
        $especialidades  =  new Especialidad();
        $especialidades =  $especialidades->all()->sortBy('nombre');

        $tipo_prestacion  =  new TipoPrestacion();
        $tiposprestaciones =  $tipo_prestacion->all()->sortBy('nombre');
        
        $datos='Se han cargado los datos de la persona';

        return view('admin.prestador.prestaciones', compact('tiposprestaciones','especialidades','persona','datos'));

    }

    public function eliminarprestacion($id)
    {
    
        $pres = Prestacion::findOrFail($id); 

        
        $persona_id = $pres->personas_id;

        $persona = Persona::where('id',$persona_id)->firstOrFail();
            
        $especialidades  =  new Especialidad();
        $especialidades =  $especialidades->all()->sortBy('nombre');

        $tipo_prestacion  =  new TipoPrestacion();
        $tiposprestaciones =  $tipo_prestacion->all()->sortBy('nombre');
        
        $pres->delete();

        $datos = 'Registro eliminado correctamente';
        return view('admin.prestador.prestaciones',compact('tiposprestaciones','especialidades','persona','datos'));
        
    }
}
