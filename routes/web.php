<?php

use App\Http\Controllers\EcoleController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::post('/doLogin',[UsersController::class,'doLogin'])->name('login.user.admin');


Route::get('/administration/dashboard',[UsersController::class,'index'])->name('admin.dashboard');
Route::get('/administration/ecole/',[EcoleController::class,'ecole'])->name('admin.ecole.index');
Route::post('/administration/ecole/addEcole',[EcoleController::class,'addEcole'])->name('admin.ecole.addEcole');
Route::get('/administration/ecole/edit/{id}',[EcoleController::class,'edit'])->name('admin.ecole.edit');
Route::post('/administration/ecole/EditEcole',[EcoleController::class,'SaveEditEcole'])->name('admin.ecole.SaveEditEcole');
