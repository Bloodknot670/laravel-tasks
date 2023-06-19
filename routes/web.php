<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\CategoriesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Método para traer todos los todos
Route::get('/todos',[TodosController::class,'index'])->name('todos');

//Método para crear un todo
Route::post('/todos',[TodosController::class,'store'])->name('todos');

//Método para obtener un todo por id
Route::get('/tareas/{id}',[TodosController::class,'show'])->name('todos-show');

//Método para editar un todo
Route::patch('/tareas/update/{id}',[TodosController::class,'update'])->name('todos-update');

//Método para eliminar un todo
Route::delete('/tareas/delete/{id}',[TodosController::class,'destroy'])->name('todos-delete');

//Métodos del controlador de categorías como recurso
Route::resource('categorias',CategoriesController::class);
