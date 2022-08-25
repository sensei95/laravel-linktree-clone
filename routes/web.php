<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::view('layouts/master', 'layouts.master');

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('links', LinkController::class);

    Route::get('settings', [UserController::class,'edit'])->name('user.edit');
    Route::post('settings', [UserController::class,'update'])->name('user.update');
});

Route::post('/visit/{link}', [VisitController::class,'store'])->name('visit.store');

//http://127.0.0.1:8000/username
Route::get('/{user:user_name}', [UserController::class,'show'])->name('user.show');
