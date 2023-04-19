<?php

use App\Http\Controllers\Data;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\verifyStudent;

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
    return view('formOne');
});

Route::get('/d',[Data::class, 'requestData']);
Route::post('/',[verifyStudent::class, 'verifyStudentForm'])->name('verify');

