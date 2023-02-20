<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:product_view|product_create|product_edit|product_delete', ['only' => ['index','show']]);
         $this->middleware('permission:product_create', ['only' => ['create','store']]);
         $this->middleware('permission:product_edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product_delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //GET
      $products = Product::orderByDesc('id')
      ->leftJoin('categories', 'products.product_category_id', '=', 'categories.id')
      ->leftJoin('brands', 'products.product_brand_id', '=', 'brands.id')
      ->select('products.*', 'categories.category_name', 'brands.brand_name')
      ->get();

      return view('products.index', [
        'products' => $products,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //GET
        $categories = Category::orderByDesc('id')->get();
        $brands = Brand::orderByDesc('id')->get();
  
        return view('products.create', [
          'categories' => $categories,
          'brands' => $brands,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //POST
        $data = $request->validated();

        if ($request->file('product_image') != null) {
          $imagePath = $request->file('product_image')->store('product_images', 'public');
        } else {
          $imagePath = '';
        }

        Product::create([
          'product_name' => $data['product_name'],
          'product_cost' => $data['product_cost'],
          'product_general_price' => $data['product_general_price'],
          'product_wholesale_price' => $data['product_wholesale_price'],
          'product_special_price' => $data['product_special_price'],
          'product_barcode' => $data['product_barcode'],
          'product_description' => $data['product_description'],

          'product_image' => $imagePath,

          'product_category_id' => $data['product_category_id'],
          'product_brand_id' => $data['product_brand_id'],

          'created_by_id' => $data['created_by_id'],
          'created_by_name' => $data['created_by_name'],
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //GEt
        $category = Category::where('categories.id', '=', $product->product_category_id)->get();
        $brand = Brand::where('brands.id', '=', $product->product_brand_id)->get();

        return view('products.show', [
          'product' => $product,
          'category' => $category,
          'brand' => $brand,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //GET
        $categories = Category::orderByDesc('id')->get();
        $brands = Brand::orderByDesc('id')->get();
  
        return view('products.edit', [
          'product' => $product,
          'categories' => $categories,
          'brands' => $brands,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //PUT
        $data = $request->validated();

        if ($request->file('product_image') != null) {
          $imagePath = $request->file('product_image')->store('product_images', 'public');
        } else {
          $imagePath = $product->product_image;
        }

        $product->update([
          'product_name' => $data['product_name'],
          'product_cost' => $data['product_cost'],
          'product_general_price' => $data['product_general_price'],
          'product_wholesale_price' => $data['product_wholesale_price'],
          'product_special_price' => $data['product_special_price'],
          'product_barcode' => $data['product_barcode'],
          'product_description' => $data['product_description'],

          'product_image' => $imagePath,

          'product_category_id' => $data['product_category_id'],
          'product_brand_id' => $data['product_brand_id'],

          'updated_by_id' => $data['updated_by_id'],
          'updated_by_name' => $data['updated_by_name'],
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
