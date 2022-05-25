<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\PedidosController;
use Illuminate\Support\Facades\Route;



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
    Route::resource('clientes', ClientesController::class);

    Route::get('datatables/clientes', [ClientesController::class, 'RegistrosDatatables'])->name('clientes.datatables');
    Route::get('get-municipios', [ClientesController::class, 'getMunicipios'])->name('getMunicipios');
    Route::delete('clientes/{cliente}',[ClientesController::class, 'destroy'])->name('clientes.destroy');
});
