<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class ProductCategoryFilterCOntroller extends Controller
{
  public function show($category)
  {
    $brands = Brand::orderBy('brand_code', 'asc')->get();
    
    $category_product = Category::join('products', 'categories.id', '=', 'products.product_category_id')
    ->where('products.product_category_id', '=', $category)
    ->select('categories.id')
    ->get();
    $categories = Category::whereIn('id', $category_product)->get();
    $category_menus = Category::orderBy('id', 'asc')->get();

    $products = Product::orderByDesc('id')
    ->leftJoin('categories', 'products.product_category_id', '=', 'categories.id')
    ->leftJoin('brands', 'products.product_brand_id', '=', 'brands.id')
    ->select('products.*', 'categories.category_name', 'brands.brand_name')
    ->where('products.product_category_id', '=', $category)
    ->get();

    return view('homes.index', [
      'brands' => $brands,
      'categories' => $categories,
      'category_menus' => $category_menus,
      'products' => $products,
    ]);
  }
}