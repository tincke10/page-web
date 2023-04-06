<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Especialidad;

class AdminEspecialidadController extends Controller
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
        $especialidades = Especialidad::where('nombre','like',"%$nombre%")->orderBy('nombre')->paginate(5);
        return view('admin.especialidad.index',compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.especialidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $cat = new Category();
        $cat->nombre = $request->nombre;
        $cat->slug = $request->slug;
        $cat->descripcion = $request->descripcion;
        $cat->save();
        return $cat;*/

        //return Category::create($request->all());

        $request->validate([
            'nombre'=> 'required|max:50|unique:especialidades,nombre',
            'slug'=> 'required|max:50|unique:especialidades,slug' 
        ]);

        Especialidad::create($request->all());
        return redirect()->route('admin.especialidad.index')->with('datos','Registro creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $esp = Especialidad::where('slug',$slug)->firstOrFail();
        $editar = "Si";

        return view('admin.especialidad.show',compact('esp','editar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $esp = Especialidad::where('slug',$slug)->firstOrFail();
        $editar = "Si";

        return view('admin.especialidad.edit',compact('esp','editar'));
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
        $esp = Especialidad::findOrFail($id); 


        
        $request->validate([
            // Con eel $cat->id del final ignora el del mismo id
            'nombre'=> 'required|max:50|unique:especialidades,nombre,'.$esp->id,
            'slug'=> 'required|max:50|unique:especialidades,slug,'.$esp->id 
        ]);
        /*$cat->nombre = $request->nombre;
        $cat->slug = $request->slug;
        $cat->descripcion = $request->descripcion;
        $cat->save();
        return $cat;
        */
        $esp->fill($request->all())->save();
        //return $cat;
        return redirect()->route('admin.especialidad.index')->with('datos','Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $esp = Especialidad::findOrFail($id); 
        $esp->delete();
        return redirect()->route('admin.especialidad.index')->with('datos','Registro eliminado correctamente');
    }
}
