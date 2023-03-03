<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuoteProductRequest;
use App\Http\Requests\UpdateQuoteProductRequest;
use App\Models\QuoteProduct;

class QuoteProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuoteProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuoteProductRequest $request)
    {
      //POST
      $data = $request->validated();

      if ($request->file('product_image') != null) {
        $imagePath = $request->file('product_image')->store('quote_product_images', 'public');
      } else {
        $imagePath = '';
      }

      QuoteProduct::create([
        'product_id' => $data['product_id'],
        'quote_id' => $data['quote_id'],
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

      return redirect()->back();
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuoteProduct  $quoteProduct
     * @return \Illuminate\Http\Response
     */
    public function show(QuoteProduct $quoteProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuoteProduct  $quoteProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(QuoteProduct $quoteProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuoteProductRequest  $request
     * @param  \App\Models\QuoteProduct  $quoteProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuoteProductRequest $request, QuoteProduct $quoteProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuoteProduct  $quoteProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuoteProduct $quoteProduct)
    {
        //
    }
}
