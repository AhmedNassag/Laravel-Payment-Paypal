<?php

use App\Http\Controllers\PaypalController;
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

Route::get('payment',[PaypalController::class,'payment'])->name('payment');
Route::get('payment-go',[PaypalController::class,'goPayment'])->name('payment-go');
Route::get('payment-cancel',[PaypalController::class,'cancel'])->name('payment-cancel');
Route::get('payment-success',[PaypalController::class,'success'])->name('payment-success');
