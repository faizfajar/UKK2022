<?php

use App\Http\Controllers\CatatanPerjalananController;
use App\Models\CatatanPerjalanan;
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
    return view('auth.login');
});
// Route::get('login');

Auth::routes();

// Route::group(]);

Route::resource('catatanperjalanan', CatatanPerjalananController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

