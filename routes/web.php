<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { 
    return view('web.inicio');
}); 

Route::get('/conocer_plan/{plan}','SolicitarInformacionPlanes@formulario_planes',['plan'=>'$plan']); 
Route::post('/conocer_plan','SolicitarInformacionPlanes@enviar_formulario'); 


Route::get('/consulta','ControladorPagina@formulario_consulta'); 
Route::post('/consulta','ControladorPagina@enviar_consulta'); 


Route::get('/centros', function () {
    return view('web.centros');
});


Route::get('/saludvirtual', function () {
    return view('web.saludvirtual');
});

Route::get('/farmacias', function () {
    return view('web.farmacias');
});

Route::get('/legales', function (){
    return view('web.legales');
    });

Route::get('/ostammaapp', function (){
        return view('web.ostammaapp');
        });
Route::get('/credencial', function (){
        return view('web.credencial');
        });
Route::get('/gespres', function (){
        return view('web.gespres');
        });
Route::get('/localidades','SolicitarInformacionPlanes@getLocalidades'); 

Auth::routes();

Route::get('/plan/{plan}', 'ControladorPagina@plan', ['plan' => '$plan']);
Route::get('/prestadores','ControladorPagina@prestadores', ['plan' => '$plan']);
Route::post('/prestadores','ControladorPagina@buscarprestadores', ['plan' => '$plan_id', 'localidad' => '$localidad_id']);

Route::get('/archivo/{archivo}', function ($archivo) {
    $public_path = public_path();
    $url = $public_path.'/fuente/'.$archivo.'.pdf';
     
      return response()->download($url);
     

});


Route::get('/prueba','Administracion@prueba'); 
 
Route::get('/admin','Administracion@inicio'); 
Route::get('/home','Administracion@inicio'); 

Route::get('/exportar','ExportarConsultas@export');
Route::get('/exportar_reprogramadas','ExportarConsultasReprogramadas@export');
Route::get('/exportar_paracontactar','ExportarConsultasParaContactar@export');


Route::resource('admin/category','Admin\AdminCategoryController')->names('admin.category');
Route::resource('admin/especialidad','Admin\AdminEspecialidadController')->names('admin.especialidad');
Route::resource('admin/consulta','Admin\AdminConsultaController')->names('admin.consulta');

Route::get('admin/consultas/paracontactar','Admin\AdminConsultaController@paracontactar')->name('admin.consultas.paracontactar');
Route::get('admin/consultas/reprogramadas','Admin\AdminConsultaController@reprogramadas')->name('admin.consultas.reprogramadas');

Route::resource('admin/prestador','Admin\AdminPrestadorController')->names('admin.prestador');
Route::get('admin/prestador/{persona}/prestaciones','Admin\AdminPrestadorController@prestaciones')->name('admin.prestador.prestaciones'); 
Route::get('admin/prestador/{persona}/nuevaprestacion','Admin\AdminPrestadorController@nuevaprestacion')->name('admin.prestador.nuevaprestacion'); 
Route::post('admin/prestador/{persona}/agregarprestacion','Admin\AdminPrestadorController@agregarprestacion')->name('admin.prestador.agregarprestacion'); 
Route::delete('admin/prestador/eliminarprestacion/{id}','Admin\AdminPrestadorController@eliminarprestacion')->name('admin.prestador.eliminarprestacion'); 


Route::resource('admin/establecimiento','Admin\AdminEstablecimientoController')->names('admin.establecimiento');
Route::get('admin/establecimiento/{persona}/especialidades','Admin\AdminEstablecimientoController@especialidades')->name('admin.establecimiento.especialidades'); 
Route::get('admin/establecimiento/{persona}/nuevaespecialidad','Admin\AdminEstablecimientoController@nuevaespecialidad')->name('admin.establecimiento.nuevaespecialidad'); 
Route::post('admin/establecimiento/{persona}/agregarespecialidad','Admin\AdminEstablecimientoController@agregarespecialidad')->name('admin.establecimiento.agregarespecialidad'); 
Route::delete('admin/establecimiento/eliminarespecialidad/{id}','Admin\AdminEstablecimientoController@eliminarespecialidad')->name('admin.establecimiento.eliminarespecialidad'); 

Route::resource('admin/plan','Admin\AdminPlanController')->names('admin.plan');
Route::get('admin/plan/{persona}/establecimientos','Admin\AdminPlanController@establecimientos')->name('admin.plan.establecimientos'); 
Route::get('admin/plan/{persona}/nuevoestablecimiento','Admin\AdminPlanController@nuevoestablecimiento')->name('admin.plan.nuevoestablecimiento'); 
Route::post('admin/plan/{persona}/agregarestablecimiento','Admin\AdminPlanController@agregarestablecimiento')->name('admin.plan.agregarestablecimiento'); 
Route::delete('admin/plan/eliminarestablecimiento/{id}','Admin\AdminPlanController@eliminarestablecimiento')->name('admin.plan.eliminarestablecimiento'); 


Route::get('cancelar/{ruta}',function($ruta){
    return redirect()->route($ruta)->with('cancelar','Acción cancelada');
})->name('cancelar');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
