<?php

use Illuminate\Support\Facades\Route;

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

/* Pagina Inicial */
Route::get('/', function () {
    return view('welcome');
})->name('inicio');

/* Pagina Sobre Nos */
Route::get('/about-us', function () {
    return view('about');
})->name('about-us');

/* Pagina Servicos */
Route::get('/services', function () {
    return view('services');
})->name('services');

/* Pagina Produtos */
Route::get('/products', function () {
    return view('products');
})->name('products');

/* Pagina Contacte-nos */
Route::get('/contact-us', function () {
    return view('contacts');
})->name('contact-us');


Auth::routes();

										/* rotas dashboard*/
Route::get('/dashboard', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('dashboard');
Route::get('/perfil', [App\Http\Controllers\Backend\HomeController::class, 'show'])->name('perfil');

//grupo de rotas -> users
Route::group(['prefix' => 'backend', 'as' => 'backend.'], function () {
    Route::resource('users', App\Http\Controllers\Backend\UserController::class);
    //rota para o metodo confirm
    Route::get('users/confirm/{users}', [App\Http\Controllers\Backend\UserController::class, 'confirm'])->name('users.confirm');
});
