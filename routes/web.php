<?php

use Illuminate\Support\Facades\Route;

Route::get('/hola', function () {
    return ('hola mundo programacion wweb');
});

Route::get('/hola2', function () {
    return view('prueba', [
        'empresa' => 'Ferretería La Bendición24'
    ]);

    
});
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\InsumosController;
use App\Http\Controllers\EmpleadosController;

Route::resource('productos', ProveedoresController::class);
Route::resource('empleados', EmpleadosController::class);
Route::resource('empleados', InsumosController::class);



Route::get('/', function () {
    return redirect()->route('productos.index');
});
