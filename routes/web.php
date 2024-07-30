<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;



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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/redirect', [HomeController::class, 'home'])->name('home');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/login', [HomeController::class, 'login'])->name('login');

// this is admin-section
//Category
Route::get('/Category', [AdminController::class, 'categoryAdd'])->name('categoryAdd');
Route::post('/categorySave', [AdminController::class, 'categoryAdded'])->name('categoryAdded');
Route::get('/categorydelete/{id}', [AdminController::class, 'categoryDelete'])->name('categoryDelete');

//Product
Route::get('/addProduct', [ProductController::class, 'addProduct'])->name('addProduct');
Route::get('/showProduct', [ProductController::class, 'showProduct'])->name('showProduct');
Route::post('/storeProduct', [ProductController::class, 'storeProduct'])->name('storeProduct');
//delete Product
Route::get('/deleteProduct/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');

//Edit Product
Route::get('/editProduct/{id}', [ProductController::class, 'editProduct'])->name('editProduct');
Route::post('/updateProduct/{id}', [ProductController::class, 'updateProduct'])->name('updateProduct');

//Product detail
Route::get('/Productdetail/{id}', [HomeController::class, 'productDetail'])->name('productDetail');


//Add to cart
Route::post('/addTocart/{id}', [HomeController::class, 'addToCart'])->name('addToCart');
//cartView
Route::get('/cartview', [HomeController::class, 'cartView'])->name('cartView');

// Deletecart
Route::get('/deleteCart/{id}', [HomeController::class, 'deleteCart'])->name('deleteCart');

//Order table store
Route::get('/orderStore', [HomeController::class, 'orderStore'])->name('orderStore');
//orderview page
Route::get('/orderview', [HomeController::class, 'orderView'])->name('orderView');
//cancel order
Route::get('/cancelorder/{id}', [HomeController::class, 'cancelOrder'])->name('cancelOrder');
//admin order
Route::get('/order', [AdminController::class, 'order'])->name('order');

//delivery admin
Route::get('/delivery/{id}', [AdminController::class, 'delivery'])->name('delivery');
//pdf download
Route::get('/pdfdownload/{id}', [AdminController::class, 'pdfDownload'])->name('pdfDownload');

//search order admin
Route::get('/searchOrder', [AdminController::class, 'searchOrder'])->name('searchOrder');
//search home products
Route::get('/searchProduct', [HomeController::class, 'searchProduct'])->name('searchProduct');
//send email
Route::get('/sendEmail/{id}', [AdminController::class, 'sendEmail'])->name('sendEmail');
//send email to respective user
Route::post('/sendmailid/{id}', [AdminController::class, 'send_email_id'])->name('send_email_id');


//PAY USING STRIPE
Route::get('/stripe/{total_price}', [HomeController::class, 'stripe'])->name('stripe');

Route::post('/stripe/{total_price}', [HomeController::class, 'stripePost'])->name('stripe.post');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
