<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::post('/doLogin',[UsersController::class,'doLogin'])->name('login.user.admin');


Route::get('/administration/dashboard',[UsersController::class,'index'])->name('admin.dashboard');