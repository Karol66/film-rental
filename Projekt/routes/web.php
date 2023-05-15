<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

use App\Http\Controllers\ShopController;

use App\Http\Controllers\BasketController;

use App\Http\Controllers\FilmController;
use App\Http\Controllers\UserController;

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
});

Route::get('index', function () {
    return view('index');
})->name('index');

Route::get('/login', [AuthManager::class,'login'])->name('login');
Route::post('/login', [AuthManager::class,'loginPost'])->name('login.post');

Route::get('/registration', [AuthManager::class,'registration'])->name('registration');
Route::post('/registration', [AuthManager::class,'registrationPost'])->name('registration.post');

Route::get('/logout',[AuthManager::class, 'logout'])->name('logout');

Route::resource("/film", FilmController::class);

Route::get('/film', [FilmController::class,'index'])->name('film.index');

Route::resource("/users", UserController::class);

Route::get('/users', [UserController::class,'index'])->name('users.index');

Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/films', [ShopController::class, 'films'])->name('shop.films');
Route::get('/shop/account', [ShopController::class, 'account'])->name('shop.account');
// Route::get('/', [ShopController::class, 'store'])->name('basket.store');
Route::post('/add_to_basket/{id}', [ShopController::class, 'addToBasket'])->name('add_to_basket');
Route::get('/basket', [ShopController::class, 'basket'])->name('shop.basket');
Route::patch('/update_basket', [ShopController::class, 'update'])->name('update_basket');
Route::delete('/shop/delete', [ShopController::class, 'remove'])->name('shop.delete');








