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
    Route::get('/', function () { return view('landingPage'); });
    Route::get('/home', [cv_controller::class, 'home'])->name('home');
    Route::get('cv/create', [cv_controller::class, 'create'])->name('cv.create');
    Route::get('cv/create/{id}', [cv_controller::class, 'form'])->name('cv.form');
    Route::post('cv/store', [cv_controller::class, 'store'])->name('store');
    Route::get('/countries', [cv_controller::class, 'getCountries']);
    Route::get('/cv/download/{id}', [cv_controller::class, 'generatePDF']);
    Route::get('cv/delete/{id}', [cv_controller::class, 'delete'])->name('cv.destroy');
    Route::get('/cv/update/{id}', [cv_controller::class, 'update'])->name('cv.update');
    Route::get('cv/detail/{id}', [cv_controller::class, 'detail'])->name('cv.detail');
    Route::get('template/{temp}', function ($temp) {
        return view('template.'.$temp);
    });
    Route::get('/Upload/images/{filename}', [cv_controller::class, 'getimage']);
});

Route::middleware(['middleware' => 'guest'])->group(function () {
    Route::get('/', function () {
        return view('landingPage');
    });
});


Route::get('/index', [cv_controller::class, 'index1']);

