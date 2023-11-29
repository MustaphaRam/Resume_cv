<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cv_controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['middleware' => 'auth'])->group(function () {
    Route::get('/home', [cv_controller::class, 'index'])->name('home');
    Route::get('cv/create', [cv_controller::class, 'create'])->name('create');
    Route::post('cv/store', [cv_controller::class, 'store'])->name('store');
});


Route::middleware(['middleware' => 'guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});


Route::get('/index', [cv_controller::class, 'index1']);

