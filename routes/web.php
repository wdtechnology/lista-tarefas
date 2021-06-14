<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChartJsController;

Route::get('/', function () {
    return view('bem-vindo');
});

Auth::routes(['verify'=>true]);

Route::get('chartjs', [ChartJsController::class, 'index'])
    ->name('chartjs.index');

    Route::middleware(['client'])->group(function(){

        Route::get('tarefa/exportar', [TarefaController::class,'exportar'])
            ->name('tarefa.exportar');
        Route::get('tarefa/exportacao/{extensao}', [TarefaController::class,'exportacao'])
            ->name('tarefa.exportacao');
        Route::get('client',[ClientController::class,'index'])
            ->name('client');
        
    });
    

Route::resource('/tarefa',TarefaController::class)
    ->middleware('verified');

Route::middleware(['auth','verified'])->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/mensagem-teste',function(){
        Mail::to('jhugosilva@outlook.com')->send(new App\Mail\MensagemTesteMail());
    });
});


Route::middleware(['master'])->group(function(){
    Route::get('master',[MasterController::class,'index'])->name('master');
});



