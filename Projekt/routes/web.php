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
    Route::get('film/transactions', [TransactionsController::class, 'index'])->name('film.transactions');
    Route::get('/film/films', [FilmController::class, 'film'])->name('film.films');
    Route::get('/film/search', [FilmController::class, 'search'])->name('film.search');
    Route::resource("/film", FilmController::class);
    Route::get('/film', [FilmController::class, 'index'])->name('film.index');
    Route::get('/film/{id}/edit', [FilmController::class, 'edit'])->name('film.edit');
    Route::patch('/film/{id}', [FilmController::class, 'update'])->name('film.update');
    Route::delete('/film/{id}', [FilmController::class, 'destroy'])->name('film.destroy');
    Route::post('/film/{id}', [FilmController::class, 'restore'])->name('film.restore');


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
    Route::get('/shop/account', [ShopController::class, 'account'])->name('shop.account');
    Route::post('/add-to-basket/{id}', [ShopController::class, 'addToBasket'])->name('add_to_basket');
    Route::get('/basket', [ShopController::class, 'basket'])->name('shop.basket');
    Route::post('/update-basket/{id}', [ShopController::class, 'update'])->name('update_basket');
    Route::delete('/shop/delete', [ShopController::class, 'delete'])->name('shop.delete');
    Route::get('/shop/search', [ShopController::class, 'search'])->name('shop.search');

    Route::post('/shop/account/payment', [ShopController::class, 'pay'])->name('shop.pay');
    Route::get('/shop/account/payment',  [ShopController::class, 'payment'])->name('shop.payment');

    Route::get('/shop/account/change', [AuthManager::class, 'changePasswordForm'])->name('shop.password_change');
    Route::post('/shop/account/change', [AuthManager::class, 'update'])->name('account.update');

    Route::resource('/shop/account/addresses', AdressesController::class);
    Route::get('/shop/account/addresses', [AdressesController::class, 'index'])->name('addresses.index');
    Route::get('/shop/account/create', [AdressesController::class, 'create'])->name('shop.create');
    Route::patch('/shop/account/{id}', [AdressesController::class, 'update'])->name('shop.update');
    Route::get('/shop/account/{id}/edit', [AdressesController::class, 'edit'])->name('shop.edit');
});


Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/info', function () {
    return view('info');
})->name('info');

Route::get('/shop/{id}', [ShopController::class, 'show'])->name('shop.show');

Route::get('/loading', function () {
    return view('loading');
});

