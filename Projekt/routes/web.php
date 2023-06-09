<?php

use App\Http\Controllers\AdressesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ShopController::class, 'index'])->name('index');

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::middleware([\App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::post('/film-type', [FilmController::class, 'storeFilmType'])->name('filmType.storeFilmType');
    Route::put('/film-type/{id}', [FilmController::class, 'updateFilmType'])->name('filmType.updateFilmType');
    Route::get('/transactions', [TransactionsController::class, 'index'])->name('film.transactions');
    Route::get('/films', [FilmController::class, 'film'])->name('film.films');
    Route::get('/films/search', [FilmController::class, 'search'])->name('film.search');
    Route::resource("/film", FilmController::class);
    Route::get('/film', [FilmController::class, 'index'])->name('film.index');
    Route::get('/films/{id}/edit', [FilmController::class, 'edit'])->name('film.edit');
    Route::get('/films/{id}', [FilmController::class, 'show'])->name('film.show');
    Route::patch('/films/{id}', [FilmController::class, 'update'])->name('film.update');
    Route::delete('/films/{id}', [FilmController::class, 'destroy'])->name('film.destroy');
    Route::post('/films/{id}', [FilmController::class, 'restore'])->name('film.restore');

    Route::get('/users/search', [UserController::class, 'search'])->name('users.search');
    Route::resource("/users", UserController::class);
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::patch('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{id}', [UserController::class, 'restore'])->name('users.restore');
});

Route::middleware([\App\Http\Middleware\UserMiddleware::class])->group(function () {
    Route::get('/shop/films', [ShopController::class, 'films'])->name('shop.films');
    Route::get('/shop/accouts', [ShopController::class, 'account'])->name('shop.account');
    Route::post('/add-to-basket/{id}', [ShopController::class, 'addToBasket'])->name('add_to_basket');
    Route::get('/basket', [ShopController::class, 'basket'])->name('shop.basket');
    Route::post('/update-basket/{id}', [ShopController::class, 'update'])->name('update_basket');
    Route::delete('/shop/delete', [ShopController::class, 'delete'])->name('shop.delete');
    Route::get('/shop/search', [ShopController::class, 'search'])->name('shop.search');

    Route::post('/shop/accouts/payment', [ShopController::class, 'pay'])->name('shop.pay');
    Route::get('/shop/accouts/payment',  [ShopController::class, 'payment'])->name('shop.payment');

    Route::get('/shop/accouts/change', [AuthManager::class, 'changePasswordForm'])->name('shop.password_change');
    Route::post('/shop/accouts/change', [AuthManager::class, 'update'])->name('account.update');

    Route::resource('/shop/accouts/addresses', AdressesController::class);
    Route::get('/shop/accouts/addresses', [AdressesController::class, 'index'])->name('addresses.index');
    Route::get('/shop/accouts/addresses/create', [AdressesController::class, 'create'])->name('shop.create');
    Route::patch('/shop/accouts/addresses/{id}', [AdressesController::class, 'update'])->name('shop.update');
    Route::get('/shop/accouts/addresses/{id}/edit', [AdressesController::class, 'edit'])->name('shop.edit');
    Route::delete('/shop/accouts/addresses/{id}', [AdressesController::class, 'destroy'])->name('shop.destroy');
    Route::post('/shop/accouts/addresses/{id}', [AdressesController::class, 'restore'])->name('shop.restore');
});


Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/info', function () {
    return view('info');
})->name('info');

Route::get('/shop/{id}', [ShopController::class, 'show'])->name('shop.show');
