<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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

//Usuário Comum
Route::get('/', [EventController::class, 'index']);
Route::get('telaDenuncia', [EventController::class, 'telaDenuncia']);
Route::post('fecharDenuncia/{id}', [EventController::class, 'fecharDenuncia']);
Route::post('obrigado', [EventController::class, 'salvarDenuncia']);



//Usuário Master
Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');
Route::get('esqsenha', [EventController::class, 'esqsenha']);


/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/
