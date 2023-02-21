<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $brands = Brand::orderBy('brand_code', 'asc')->get();
      
      $category_product = Category::join('products', 'categories.id', '=', 'products.product_category_id')
      ->select('categories.id')
      ->get();
      $categories = Category::whereIn('id', $category_product)
      ->get();
      $category_menus = Category::orderBy('id', 'asc')->get();
      
      $products = Product::orderByDesc('id')->get();
  
        return view('homes.index', [
          'brands' => $brands,
          'categories' => $categories,
          'category_menus' => $category_menus,
          'products' => $products,
        ]);
    }

    public function show($brand)
    {
      $brands = Brand::orderBy('brand_code', 'asc')->get();
      
      $category_product = Category::join('products', 'categories.id', '=', 'products.product_category_id')
      ->where('products.product_brand_id', '=', $brand)
      ->select('categories.id')
      ->get();
      $categories = Category::whereIn('id', $category_product)->get();
      $category_menus = Category::orderBy('id', 'asc')->get();

      $products = Product::orderByDesc('id')
      ->where('product_brand_id', '=', $brand)
      ->get();
  
        return view('homes.index', [
          'brands' => $brands,
          'categories' => $categories,
          'category_menus' => $category_menus,
          'products' => $products,
        ]);
    }
}
