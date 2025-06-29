<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Main;

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

// out app
Route::middleware('CheckLogout')->group(function(){

    Route::get('/login', [Main::class, 'login'])->name('login');
    Route::post('/login_submit', [Main::class, 'login_submit'])->name('login_submit');

});

// in app
Route::middleware('CheckLogin')->group(function(){

    Route::get('/', [Main::class, 'index'])->name('index');
    Route::get('/logout', [Main::class, 'logout'])->name('logout');

    // funcionario - inserir
    Route::get('/novo_funcionario', [Main::class, 'novo_funcionario'])->name('novo_funcionario');
    Route::post('/novo_funcionario_submit', [Main::class, 'novo_funcionario_submit'])->name('novo_funcionario_submit');

    // funcionario - editar
    Route::get('/editar_funcionario/{id}', [Main::class, 'editar_funcionario'])->name('editar_funcionario');
    Route::post('/editar_funcionario_submit', [Main::class, 'editar_funcionario_submit'])->name('editar_funcionario_submit');

    // funcionario - excluir
    Route::get('/delete_funcionario/{id}', [Main::class, 'delete_funcionario'])->name('delete_funcionario');
    Route::post('/delete_funcionario_submit', [Main::class, 'delete_funcionario_submit'])->name('delete_funcionario_submit');
});
