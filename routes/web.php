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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio');

/* Pagina Sobre Nos */
Route::get('/about-us', function () {
    return view('about');
})->name('about-us');

/* Pagina Servicos */
Route::get('/services', function () {
    return view('services');
})->name('services');

/* Pagina Produtos */
Route::get('/products', [App\Http\Controllers\HomeController::class, 'products'])->name('products');

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

//grupo de rotas -> products
Route::group(['prefix' => 'backend', 'as' => 'backend.'], function () {
    Route::resource('products', App\Http\Controllers\Backend\ProductController::class);
});

//grupo de rotas -> animais
Route::group(['prefix' => 'backend', 'as' => 'backend.'], function () {
    Route::resource('animals', App\Http\Controllers\Backend\AnimalController::class);
});

//grupo de rotas -> agendamentos
Route::group(['prefix' => 'backend', 'as' => 'backend.'], function () {
    Route::resource('appointments', App\Http\Controllers\Backend\AppointmentController::class);
    Route::get('/appointments-json', [App\Http\Controllers\Backend\AppointmentController::class, 'getAppointmentsJson']);
});

//Rotas do Carrinho
Route::get('/shopping-cart', [App\Http\Controllers\CartController::class, 'productCart'])->name('shopping.cart');
Route::get('/product/{id}', [App\Http\Controllers\CartController::class, 'addProductToCart'])->name('addproduct.to.cart');
Route::patch('/update-shopping-cart', [App\Http\Controllers\CartController::class, 'updateCart'])->name('update.shopping.cart');
Route::delete('/delete-cart-product', [App\Http\Controllers\CartController::class, 'deleteProductFromCart'])->name('delete.cart.product');

//checkout
Route::get('/checkout', [App\Http\Controllers\CartController::class, 'showCheckoutForm'])->name('checkout');
Route::post('/checkout', [App\Http\Controllers\CartController::class, 'checkout']);

//pedidos
Route::get('/list-orders', [App\Http\Controllers\Backend\OrderController::class, 'index'])->name('backend.orders.index');
Route::get('/generate-pdf/{order}', [App\Http\Controllers\Backend\OrderController::class, 'generatePDF'])->name('generate.pdf');
Route::post('/orders/{order}/approve', [App\Http\Controllers\Backend\OrderController::class, 'approveOrder'])->name('backend.orders.approve');
Route::post('/orders/{order}/reject', [App\Http\Controllers\Backend\OrderController::class, 'rejectOrder'])->name('backend.orders.reject');

