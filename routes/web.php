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

Route::get('/', function () {
  return view('homes.index', [
    'brands' => Brand::orderBy('brand_code', 'asc')->get(),
    'categories' => Category::orderBy('category_code', 'asc')->get(),
    'products' => Product::orderByDesc('id')->get(),
  ]);
});

Route::get('/admin', function () {
  return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
  Route::resource('roles', RoleController::class);
  Route::resource('users', UserController::class);

  Route::resource('products', ProductController::class);
  Route::resource('categories', CategoryController::class);
  Route::resource('brands', BrandController::class);
});