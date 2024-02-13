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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
