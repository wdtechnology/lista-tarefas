<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('bem-vindo');
});

Auth::routes(['verify'=>true]);

Route::get('tarefa/exportacao/{extensao}', [App\Http\Controllers\TarefaController::class,'exportacao'])
    ->name('tarefa.exportacao');
Route::get('tarefa/exportar', [App\Http\Controllers\TarefaController::class,'exportar'])
    ->name('tarefa.exportar');

Route::resource('/tarefa',App\Http\Controllers\TarefaController::class)
    ->middleware('verified');

Route::middleware(['auth','verified'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/mensagem-teste',function(){
        Mail::to('jhugosilva@outlook.com')->send(new App\Mail\MensagemTesteMail());
    });
});


