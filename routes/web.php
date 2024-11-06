<?php

use App\Http\Controllers\appController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\CaseUpdateController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function ()
{
    Route::get('/show', [AppController::class, 'showAceptes']
    )->name('open');
    
    Route::get('/finish', [AppController::class, 'showFinish'])
    ->name('finished_call');
    
    Route::get('/user', [AppController::class, 'show'])
    ->name('user');
    
   
    
    Route::get('/cases/acepte/ ', [CaseUpdateController::class, 'update'])
    ->name('acepte');
    Route::get('/cases/update', [CaseUpdateController::class, 'update'])->name( 'caseUpdate');
    Route::get('/cases/Confirm', [CaseUpdateController::class, 'confirm'])->name( 'caseConfirm');
});

Route::post('/register', [CaseController::class, 'create'])
->name('register');

Route::get('/', function (){
    return view('landing');
})->name('home');

Route::get('/login', function (){
    return view('login');
})->name('login');

Route::post('/user/chk',[UserController::class, 'create'])
->name('userCreate');

Route::post('/user/pass', [UserController::class, 'check'])
->name('userCheck');

Route::get('/logout', [UserController::class, 'logout'])->name('exit');

Route::get('/reg', function (){
    return view('pages.register_call'); 
})->name('open_call');

Route::get('/test', function() {
    return view('pages.teste');
});

Route::get('/confirm', function () {return view('pages.registar_confirmation');})
->name('client');