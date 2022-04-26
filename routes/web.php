<?php

use App\Http\Controllers\TodosController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TodosController::class, 'liste'])->name('liste');  

Route::get('/about', function () {
    return view('about');
});

Route::post('/action/add', [TodosController::class, 'saveTodo'])->name('save');

Route::get('/action/{id}/done', [TodosController::class, 'markAsDone'])->name('id');

Route::get('/action/{id}/delete', [TodosController::class, 'deleteTodo'])->name('id');

Route::get('/action/{id}/importance', [TodosController::class, 'makeFav'])->name('id');

Route::get('/compteur', [TodosController::class, 'listeTermine']);  
