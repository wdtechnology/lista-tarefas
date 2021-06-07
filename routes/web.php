<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('bem-vindo');
});

Auth::routes(['verify'=>true]);

Route::resource('/tarefa',App\Http\Controllers\TarefaController::class);

Route::middleware(['auth','verified'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/mensagem-teste',function(){
        Mail::to('jhugosilva@outlook.com')->send(new App\Mail\MensagemTesteMail());
    });
});


