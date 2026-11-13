<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\InsumosController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\DashboardController;

Route::middleware('guest')->group(function(){
    Route::get('/login',[AuthController::class, 'showLogin'])->name('login');
    Route::post('/login',[AuthController::class, 'login'])->name('login.post');
    
    Route::get('/login',[AuthController::class,'showRegister'])->name('register');
    Route::post('/register',[AuthController::class,'register'])->name('register.post');
    
});

Route::middleware('auth')->group(function (){
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');

    Route::get('/',function(){
        return redirect()->route('dashboard');
    });

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
});


Route::resource('proveedores', ProveedoresController::class)
    ->parameters(['proveedores' => 'proveedores']);
//Estas lineas de parameters es porque creo que me falto un tema de 
//protected table y siempre que insertaba 1 insumo o algo similar
//al querer editarlo me daba error por algo de que laravel pone el plural
//del nombre a insertar en ingles, entonces me ponia algo de providers y daba error


Route::resource('empleados', EmpleadosController::class)
    ->parameters(['empleados' => 'empleados']);

Route::resource('insumos', InsumosController::class)
    ->parameters(['insumos' => 'insumos']);
 
Route::middleware('guest')->group(function () { 
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login'); 
    Route::post('/login', [AuthController::class, 'login'])->name('login.post'); 
 
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register'); 
    Route::post('/register', [AuthController::class, 'register'])->name('register.post'); 
}); 
 
Route::middleware('auth')->group(function () { 
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); 
    Route::resource('insumos', InsumosController::class); 
 
    Route::get('/', function () { 
        return redirect()->route('insumos.index'); 
    }); 
});
