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
      $categories = Category::orderBy('category_code', 'asc')->get();
      $products = Product::orderByDesc('id')->get();
  
        return view('homes.index', [
          'brands' => $brands,
          'categories' => $categories,
          'products' => $products,
        ]);
    }
}
