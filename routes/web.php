<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\ProductCategoryFilterCOntroller;

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

Route::get('/admin', function () {
  return view('auth.login');
});

Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('homes', HomeController::class);
Route::resource('brand', HomeController::class);
Route::resource('category', ProductCategoryFilterCOntroller::class);

Route::group(['middleware' => ['auth']], function() {
  Route::resource('roles', RoleController::class);
  Route::resource('users', UserController::class);

  Route::resource('products', ProductController::class);
  Route::resource('categories', CategoryController::class);
  Route::resource('brands', BrandController::class);

  Route::resource('quotes', QuoteController::class);
});