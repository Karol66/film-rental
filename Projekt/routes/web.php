<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\FilmController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/login', [AuthManager::class,'login'])->name('login');
Route::post('/login', [AuthManager::class,'loginPost'])->name('login.post');

Route::get('/registration', [AuthManager::class,'registration'])->name('registration');
Route::post('/registration', [AuthManager::class,'registrationPost'])->name('registration.post');


Route::get('/logout',[AuthManager::class, 'logout'])->name('logout');

Route::resource("/film", FilmController::class);

Route::get('/film', [FilmController::class,'index'])->name('adminPanel');

// Route::get('/film/index', function () {
//     return view('film.index');
// })->name('admin');
