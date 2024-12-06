<?php

use App\Http\Controllers\QuartoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HospedeController;
use App\Http\Controllers\HospedagemController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');
*/

Route::resource('hospedes', HospedeController::class);

Route::post('hospedagem/search', [HospedagemController::class, 'search'])->name('hospedagem.search');
Route::resource('hospedagem', HospedagemController::class);

Route::resource('quartos', QuartoController::class);


/*
Route::fallback(function () {
    return redirect()->route('dashboard');
});
*/
