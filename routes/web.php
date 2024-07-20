<?php

use App\Http\Controllers\ToyController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;

// Route::get('/', function () {
//     return view('title');
// });

// Route::get('/about', function () {
//     return view('about');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/admindashboard', function () {
    return view('admin.index');
});

Route::get('/welcome', function () {
    return view('welcome');
});

// Route::get('/menu', function () {
//     return view('menu');
// });

// Route::get('/search', function () {
//     return view('search');
// });



// Route::get('/login', [AuthController::class, 'login']);
// Route::post('/login', [AuthController::class, 'authenticate']);

Route::controller(AppController::class)->group(function(){

    Route::get('/', 'title')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/search', 'search')->name('search');
    Route::get('/list', 'list')->name('list');

//     // Route::middleware('guest')->group(function() {
//     //     Route::get('login','login')->name('login');
//     //     Route::post('login','userLogin')->name('user.login');
//     //     Route::get('/register', 'register')->name('register');
//     //     Route::post('/register', 'userRegister')->name('user.register');
//     // });

//     // Route::middleware('auth')->group(function() {
//     //     Route::post('/logout', 'user_logout')->name('user.logout');

//     //     // Route::middleware('admin')->group(function() {
            Route::get('/admindashboard', 'admin')->name('admin.home');
//     //     // });
//     // });
});

Route::prefix('toy')->controller(ToyController::class)->group(function(){
    Route::get('create','create')->name('toy.create');
    Route::post('store','store')->name('toy.store');

    Route::get('edit/{toy}','edit')->name('toy.edit');
    Route::post('update/{toy}','update')->name('toy.update');

    Route::get('delete','delete')->name('toy.delete');
    Route::delete('delete/{toy}','delete')->name('toy.delete');
    Route::get('detail/{toy}', 'detail')->name('toy.detail');
});

Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('admin/filter/{category}', [AppController::class, 'filter'])->name('admin.filter');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/{toy}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('/invoice/{order}', [CartController::class, 'invoice'])->name('invoice');

Route::get('/toys/create', [ToyController::class, 'create'])->name('toy.create');
Route::post('/toys', [ToyController::class, 'store'])->name('toy.store');
Route::get('/toys/{toy}/edit', [ToyController::class, 'edit'])->name('toy.edit');
Route::post('/toys/{toy}', [ToyController::class, 'update'])->name('toy.update');
Route::delete('/toys/{toy}', [ToyController::class, 'destroy'])->name('toy.delete');

Route::resource('toys', ToyController::class);
Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');

Route::post('cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease');
Route::post('cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');




