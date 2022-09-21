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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::controller(App\Http\Controllers\AsistenciaController::class)->group(
    function(){
        Route::get('/asistencia/import','import')->name('asistencia.import');
        Route::post('/asistencia/saveimport','saveimport')->name('asistencia.saveimport');
    }
);
Route::controller(App\Http\Controllers\ModuloController::class)->group(
    function(){
        Route::get('/modulo/import','import')->name('modulo.import');
        Route::post('/modulo/saveimport','saveimport')->name('modulo.saveimport');
    }
);
Route::controller(App\Http\Controllers\CampoController::class)->group(
    function(){
        Route::get('/campo/import','import')->name('campo.import');
        Route::post('/campo/saveimport','saveimport')->name('campo.saveimport');
    }
);
Route::controller(App\Http\Controllers\ExamenController::class)->group(
    function(){
        Route::get('/examen/import','import')->name('examen.import');
        Route::post('/examen/saveimport','saveimport')->name('examen.saveimport');
    }
);
Route::controller(App\Http\Controllers\WpuserController::class)->group(
    function(){
        Route::get('/wpuser/export','export')->name('wpuser.export');
        //Route::post('/X/saveimport','saveimport')->name('X.saveimport')->middleware('auth');
    }
);
Route::controller(App\Http\Controllers\AlumnoController::class)->group(
    function(){
        Route::get('/alumno/import','import')->name('alumno.import');
        Route::post('/alumno/saveimport','saveimport')->name('alumno.saveimport');
    }
);
Route::controller(App\Http\Controllers\xController::class)->group(
    function(){
        Route::get('/X/import','import')->name('X.import')->middleware('auth');
        Route::post('/X/saveimport','saveimport')->name('X.saveimport')->middleware('auth');
    }
);

Route::resource('curso', App\Http\Controllers\CursoController::class);
Route::resource('alumno', App\Http\Controllers\AlumnoController::class);
Route::resource('wpuser', App\Http\Controllers\WpUserController::class);
Route::resource('asistencia', App\Http\Controllers\AsistenciaController::class);
Route::resource('modulo', App\Http\Controllers\ModuloController::class);
Route::resource('campo', App\Http\Controllers\CampoController::class);
Route::resource('examen', App\Http\Controllers\ExamenController::class);