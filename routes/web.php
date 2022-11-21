<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/loginForm', function () {
    return view('loginForm');
});
Route::get('/doctors', [\App\Http\Controllers\DoctorsController::class, 'findAll'])->name('doctors.show');
Route::get('/record', [\App\Http\Controllers\recordController::class, 'specialitiesToSelect'])->name('specialities.show');
Route::post('/selectDoctor', [\App\Http\Controllers\recordController::class, 'doctorSelect'])->name('doctorSelect');
Route::post('/selectCheck', [\App\Http\Controllers\recordController::class, 'check'])->name('checkSelect');
Route::get('/price', [\App\Http\Controllers\PriceController::class, 'priceShow'])->name('priceShow');
Route::post('/loginForm', [\App\Http\Controllers\employeesController::class, 'loginCheck'])->name('loginCheck');
