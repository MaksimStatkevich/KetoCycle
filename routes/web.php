<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserMeasurementsController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\KetoController;



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
Route::resource('/quiz', QuizController::class)->except('show');
Route::post('quiz/savetest', [QuizController::class, 'saveTest']);
Route::get('/keto', [KetoController::class, 'index'])->name('keto');