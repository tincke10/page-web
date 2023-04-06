<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Consulta;
use App\ConsultaLog;

class AdminConsultaController extends Controller
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
        $consultas = Consulta::where('apellido','like',"%$nombre%")
                ->orWhere('nombres','like',"%$nombre%")->orderBy('id','desc')->paginate(5);
        
                
        return view('admin.consulta.index',compact('consultas'));
    }


    public function reprogramadas(Request $request)
    {
        $nombre = $request->get('nombre'); 
        $consultas = Consulta::where('apellido','like',"%$nombre%")
                ->whereNotNull('fecha_reprogramacion')
                ->orderBy('fecha_reprogramacion','desc')->paginate(5);
                 

        
                
        return view('admin.consulta.reprogramadas',compact('consultas'));
    }

    public function paracontactar(Request $request)
    {
        $nombre = $request->get('nombre'); 
        $consultas = Consulta::where('apellido','like',"%$nombre%") 
                ->where('estado','EN CURSO')
                ->whereRaw('updated_at <  CURRENT_DATE-5')
                ->orderBy('updated_at','asc')->paginate(5);
        
                
        return view('admin.consulta.paracontactar',compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $editar='No';
        return view('admin.consulta.create',compact('editar'));
   

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
            'consulta'=> 'required'
        ]); 
 
        $con = Consulta::create([ 
            'apellido' => $request['apellido'],  
            'nombres' => $request['nombres'], 
            'nrodocumento' => $request['nrodocumento'],
            'telefono' => $request['telefono'],
            'estado' => $request['estado'],
            'email' => $request['email'],
            'prefijo' => $request['prefijo'],
            'area' => $request['area'],
            'fecha_reprogramacion' => $request['fecha_reprogramacion'],
            'medio' => $request['medio'], 
            'observaciones' => $request['observaciones'],
            'consulta' => $request['consulta']  
            
        ]); 

         

        $datos='Se han cargado los datos de la consulta';
        $editar = "Si";
        return view('admin.consulta.edit',compact('con','datos','editar'));
               
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $con = Consulta::where('id',$id)->firstOrFail();
        $editar = "Si";

        return view('admin.consulta.show',compact('con','editar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
            $con = Consulta::with('historial')->where('id',$id)->firstOrFail();
            $editar = "Si";
    
            return view('admin.consulta.edit',compact('con','editar'));
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
        $con = Consulta::findOrFail($id); 


        
        $request->validate([  
            'consulta'=> 'required'
        ]); 
        $con->fill($request->all())->save(); 

        $con_log = ConsultaLog::create([  
            'estado' => $request['estado'], 
            'area' => $request['area'],
            'fecha_reprogramacion' => $request['fecha_reprogramacion'], 
            'observaciones' => $request['observaciones'],
            'consulta_id' => $id
        ]); 



        return redirect()->route('admin.consulta.index')->with('datos','Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $con = Consulta::findOrFail($id); 
        $con->delete();
        return redirect()->route('admin.consulta.index')->with('datos','Registro eliminado correctamente');
    }
}
