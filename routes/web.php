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


Route::get('/reportar', function () {
    return view('report');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/seleccionar/proyecto/{id}', [App\Http\Controllers\HomeController::class, 'selectProject'])->name('home');



Route::get('/reportar', [App\Http\Controllers\IncidenController::class, 'create'])->name('home');
Route::post('/reportar', [App\Http\Controllers\IncidenController::class, 'store'])->name('home');

Route::get('/ver/{id}', [App\Http\Controllers\IncidenController::class, 'show'])->name('home');



Route::get('/incidencia/{id}/editar', [App\Http\Controllers\IncidenController::class, 'edit'])->name('home');
Route::post('/incidencia/{id}/editar', [App\Http\Controllers\IncidenController::class, 'update'])->name('home');

Route::get('/incidencia/{id}/atender', [App\Http\Controllers\IncidenController::class, 'atender'])->name('home');
Route::get('/incidencia/{id}/resolver', [App\Http\Controllers\IncidenController::class, 'resolver'])->name('home');
Route::get('/incidencia/{id}/abrir', [App\Http\Controllers\IncidenController::class, 'abrir'])->name('home');
Route::get('/incidencia/{id}/editar', [App\Http\Controllers\IncidenController::class, 'edit'])->name('home');
Route::get('/incidencia/{id}/derivar', [App\Http\Controllers\IncidenController::class, 'derivar'])->name('home');


Route::post('/mensajes', [App\Http\Controllers\MessageController::class, 'store'])->name('home');



Route::group(['middleware' => 'admin'], function(){
   //usuarios
    Route::get('/usuarios', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('index');
    Route::post('/usuarios', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('index');
    Route::get('/usuario/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('index');
    Route::post('/usuario/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('index');


    Route::get('/usuario/{id}/delete', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('index');

    //proyectos
    Route::get('/proyectos', [App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('index');
    Route::post('/proyectos', [App\Http\Controllers\Admin\ProjectController::class, 'store'])->name('index');
    Route::get('/proyecto/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'edit'])->name('index');
    Route::post('/proyecto/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'update'])->name('index');
    Route::get('/proyecto/{id}/delete', [App\Http\Controllers\Admin\ProjectController::class, 'delete'])->name('index');
    Route::get('/proyecto/{id}/restaurar', [App\Http\Controllers\Admin\ProjectController::class, 'restore'])->name('index');
    

    // Category
    Route::post('/categorias', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('edit');
    Route::post('/categoria/editar', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('edit');
    Route::get('/categoria/{id}/eliminar', [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('index');
    //level
    Route::post('/niveles', [App\Http\Controllers\Admin\LevelController::class, 'store'])->name('index');
    Route::post('/nivel/editar', [App\Http\Controllers\Admin\LevelController::class, 'update'])->name('index');
    Route::get('/nivel/{id}/eliminar', [App\Http\Controllers\Admin\LevelController::class, 'delete'])->name('index');

    //project user
    Route::post('/proyecto-usuario', [App\Http\Controllers\Admin\ProjectUserController::class, 'store']);
    Route::get('/proyecto-usuario/{id}/delete', [App\Http\Controllers\Admin\ProjectUserController::class, 'delete']);

    Route::get('/config', [App\Http\Controllers\Admin\ConfigController::class, 'index'])->name('index');
});