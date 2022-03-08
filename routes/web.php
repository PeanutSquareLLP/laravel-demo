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
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
//Auth::routes();

    //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/subjects', [App\Http\Controllers\SubjectController::class, 'index']);
    Route::post('/get-subjectsdata', [App\Http\Controllers\SubjectController::class, 'fetchSubjectData']);
    Route::get('/add-subjects', [App\Http\Controllers\SubjectController::class, 'create']);
    Route::post('/save-subject', [App\Http\Controllers\SubjectController::class, 'store']);
    Route::get('/login', [App\Http\Controllers\LoginController::class, 'loginForm']);
    Route::post('/login-form', [App\Http\Controllers\LoginController::class, 'login']);
    Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout']);

