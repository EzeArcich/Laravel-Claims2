<?php

use Illuminate\Support\Facades\Route;
//agregamos los siguientes controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SiniestroController;
use App\Http\Controllers\THController;
use App\Http\Controllers\CoordinacionesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuditController;


use Illuminate\Support\Facades\Artisan;




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
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/siniestros/{siniestro}/derivar", [SiniestroController::class, "derivar"])->name('siniestros.derivar');

Route::get('contactanos', [CoordinacionesController::class, 'index'])->name('contactanos.index');

Route::post('contactanos', [CoordinacionesController::class, 'store'])->name('contactanos.store');



//PHPMailer
Route::post('correo', [CoordinacionesController::class, 'correo'])->name('correo');
Route::post('correoEdu', [CoordinacionesController::class, 'correoEdu'])->name('correoEdu');
//

Route::post('siniestros', [SiniestroController::class, 'enviar'])->name('siniestros.enviar');

Route::get('/siniestros/peritos/', [SiniestroController::class, 'peritos']);
Route::get('/siniestros/peritosa/', [SiniestroController::class, 'peritosa']);
Route::get('/siniestros/peritosgestion/', [SiniestroController::class, 'peritosgestion']);
Route::get('/siniestros/cotizaciones/', [SiniestroController::class, 'cotizaciones']);
Route::get('/siniestros/terceros/', [SiniestroController::class, 'terceros']);
Route::get('/siniestros/derivaciones/', [SiniestroController::class, 'derivaciones']);
Route::get('/siniestros/pendientes/', [SiniestroController::class, 'pendientes'])->name('siniestros.pendientes');
Route::get('/siniestros/ausentes/', [SiniestroController::class, 'ausentes'])->name('siniestros.ausentes');
Route::get('/siniestros/coordinados/', [SiniestroController::class, 'coordinados'])->name('siniestros.coordinados');
Route::POST('/siniestros/check', [SiniestroController::class, 'check'])->name('siniestros.check');
Route::POST('siniestros/updateDerivaciones', [SiniestroController::class, 'updateDerivaciones'])->name('siniestros.updateDerivaciones');
Route::PUT('siniestros/asignarPeritos', [SiniestroController::class, 'asignarPeritos'])->name('siniestros.asignarPeritos');
Route::GET('siniestros/gestion', [SiniestroController::class, 'gestion'])->name('siniestros.gestion');




Route::post('CorreoPas', [CoordinacionesController::class, 'contacto'])->name('CorreoPas.contacto');


// ruta creada para el ContactController de prueba

Route::view('contact','contactForm')->name('contactForm');
Route::post('/send',[ContactController::class, 'send'])->name('send.email');




//y creamos un grupo de rutas protegidas para los controladores
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('siniestros', SiniestroController::class);
    Route::resource('talleres', THController::class);
    Route::resource('audits', AuditController::class);   
});

// Vista para asignaciones de IP - Edu

Route::get('/ajax', [SiniestroController::class, 'asignaciones']);
Route::get('/teacher/all', [SiniestroController::class, 'allData']);
Route::get('/teacher/allUserData', [SiniestroController::class, 'allUserData']);
Route::get('/teacher/edit/{id}', [SiniestroController::class, 'editData']); 
Route::get('/teacher/taller/{id}', [SiniestroController::class, 'tallerData']);
Route::PUT('/teacher/update/{id}', [SiniestroController::class, 'updateData']);
Route::POST('/teacher/store', [SiniestroController::class, 'storeData']);
Route::get('/teacher/users/{id}', [SiniestroController::class, 'userData']);
Route::get('/teacher/productores/{id}', [SiniestroController::class, 'productoresData']);

route::get('/siniestros/{siniestro}/editPerito', [SiniestroController::class, 'editPerito'])->name('siniestros.editPerito');
route::get('/siniestros/{siniestro}/history', [SiniestroController::class, 'history'])->name('siniestros.history');

// Vistas Datatables serverside

Route::get('datatable/users', [SiniestroController::class, 'registros']);
Route::get('datatable/registrosa', [SiniestroController::class, 'registrosa'])->name('datatable.registrosa');
Route::get('datatable/inspectores', [SiniestroController::class, 'todosUsuarios'])->name('siniestros.todosUsuarios');
Route::get('datatable/gestiona', [SiniestroController::class, 'gestiona'])->name('datatable.gestiona');

//Vistas Peritos


Route::get('/peritos/pendiente', [SiniestroController::class, 'peritoPendiente'])->name('peritos.pendiente');
Route::get('/peritos/completo', [SiniestroController::class, 'peritoCompleto'])->name('peritos.completo');
Route::get('/peritos/sincerrar', [SiniestroController::class, 'peritoSincerrar'])->name('peritos.sincerrar');
Route::get('/peritos/cerrado', [SiniestroController::class, 'peritoCerrado'])->name('peritos.cerrado');
Route::get('/peritos/pagado', [SiniestroController::class, 'peritoPagado'])->name('peritos.pagado');


Route::get('/siniestros/{siniestro}/editIngreso', [SiniestroController::class, 'editIngreso'])->name('siniestros.editIngreso');

//DomPDF
Route::POST('/siniestros/{siniestro}/download-pdf', [SiniestroController::class, 'downloadPDF'])->name('download-pdf');

//Logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('link', function() {
    Artisan::call('storage:link');
});