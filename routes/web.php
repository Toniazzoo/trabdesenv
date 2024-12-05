<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HospedeController;
use App\Http\Controllers\HospedagemController;

// Rota inicial para o dashboard
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Rota para os hóspedes
Route::resource('hospedes', HospedeController::class);


Route::resource('hospedagens', HospedagemController::class);




// Rota fallback para redirecionar quando a rota não existe
Route::fallback(function () {
    return redirect()->route('dashboard');
});
