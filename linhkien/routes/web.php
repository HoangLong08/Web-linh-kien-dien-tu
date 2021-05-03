<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\CheckoutController;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\CheckLogout;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymenentController;
use App\Models\Product;

//////////////ADMIN//////////////////
use App\Http\Controllers\AdminControllers\HomeController;
use App\Http\Controllers\AdminControllers\ProductAdminController;

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


Route::get('/', [ProductController::class, 'index']);
Route::get('home', [ProductController::class, 'index']);


Route::get('detail/{id}', [ProductController::class, 'detail']);
// Route::get('search', [ProductController::class, 'search']);
Route::get('search', [ProductController::class, 'search']);
Route::get('sort', [ProductController::class, 'sort']);


Route::get('/login', [UserController::class, 'index']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'actionRegister']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/getpassword', [ForgetPasswordController::class, 'index']);
Route::post('/getpassword', [ForgetPasswordController::class, 'forgetPassword']); 
Route::get('/getpassword/updatepassword', [ForgetPasswordController::class, 'viewUpdatePassword']);
Route::post('/getpassword/updatepassword', [ForgetPasswordController::class, 'updatePassword']);


Route::get('/cart', [CartController::class, 'index']);
Route::get('/addtocart', [CartController::class, 'addToCart']);
Route::get('/change-quantity', [CartController::class, 'changeQuantity']);
Route::get('/load-cart-data',[CartController::class, 'cartloadbyajax']);
Route::get('/clear-cart',[CartController::class, 'clearcart']);
Route::delete('/clear-cart-kth',[CartController::class, 'clearCartKth']);

Route::get('/profile', [UserController::class, 'profile']);
Route::post('/profile', [UserController::class, 'updateprofile']);

Route::get('/profile/change-password', [UserController::class, 'viewChangePassword']);
Route::post('/profile/change-password', [UserController::class, 'updatePassword']);

Route::get('/profile/manager-order', [UserController::class, 'viewManagerOrder']);

Route::get('/payment', [PaymenentController::class, 'index']);
Route::post('/payment', [PaymenentController::class, 'payment']);

Route::get('contact', [ContactController::class, 'viewContactUs']);
Route::post('/contact', [ContactController::class, 'contact']);


Route::get('/checkout', [CheckoutController::class, 'index'])->middleware("CheckLogin");
// Route::group(['middleware' => ['auth']], function(){
// });

Route::get('/admin', [HomeController::class, 'home']);
Route::get('/thong-ke', [HomeController::class, 'thong_ke']);
Route::get('/san-pham', [ProductAdminController::class, 'product']);
Route::post('/detele-product', [ProductAdminController::class, 'deleteProduct']);
Route::get('/edit-product/{id}', [ProductAdminController::class, 'editProduct']);
Route::post('/san-pham', [ProductAdminController::class, 'updateProduct']);

Route::get('/add-product', [ProductAdminController::class, 'viewAddProduct']);
Route::post('/add-product/action', [ProductAdminController::class, 'addProduct'])->name('addProduct.action');

// Route::get('/add-product', 'ProductAdminController@viewAddProduct');
// Route::post('/add-product/action', 'ProductAdminController@addProduct')->name('add-product.action');
