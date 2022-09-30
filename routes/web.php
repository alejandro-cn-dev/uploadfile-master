<?php

use App\Http\Controllers\ThesisController;
use App\Models\Thesis;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;

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
    return view('home');
})->middleware('auth');
Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::get('/admin', [ThesisController::class, 'index'])->middleware('auth.admin')->name('admin.index');
Route::get('/cliente', [ClientController::class, 'index'])->middleware('auth.client')->name('client.index');

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest')->name('login.index');
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');
Route::get('/logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('login.destroy');
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

//Route::get('/admin',[AdminController::class, 'index'])->middleware('auth.admin')->name('admin.index');

Route::post('/thesis/register', [ThesisController::class, 'store'])->name('thesis_register');
Route::get('/thesis/file/{id}', [ThesisController::class, 'urlfile'])->name('thesis_file');
Route::post('/thesis/update', [ThesisController::class, 'update'])->name('thesis_update');
Route::get('/thesis/delete/{id}', [ThesisController::class, 'destroy'])->name('thesis_delete');

Route::post('/thesis/search/', [ThesisController::class, 'search'])->name('doc_search');
