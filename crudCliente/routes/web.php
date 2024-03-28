<?php
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/inicio', function () {
    return Inertia::render('Welcome');
});*/


Route::get('/cliente',[ClienteController::class,'index'])->name('cliente.index');

Route::delete('/cliente',[ClienteController::class,'destroy'])->name('cliente.destroy');
//Route::resource('cliente', ClienteController::class);
