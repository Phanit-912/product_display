<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_products', function (Blueprint $table) {
          
          $table->id();
          $table->foreignId('product_id')->constrained('products');
          $table->foreignId('quote_id')->constrained('quotes');
          $table->string('product_name');
          $table->decimal('product_cost', 15,2)->nullable()->default(0.00);
          $table->decimal('product_general_price', 15,2)->default(0.00);
          $table->decimal('product_wholesale_price', 15,2)->nullable()->default(0.00);
          $table->decimal('product_special_price', 15,2)->nullable()->default(0.00);
          $table->string('product_barcode');
          $table->string('product_description');
          $table->string('product_image')->nullable()->default(NULL);

          $table->foreignId('product_category_id')->nullable()->default(1)->constrained('categories');
          $table->foreignId('product_brand_id')->nullable()->default(1)->constrained('brands');

          $table->foreignId('created_by_id')->constrained('users');
          $table->string('created_by_name');
          $table->foreignId('updated_by_id')->nullable()->constrained('users');
          $table->string('updated_by_name')->nullable();

          $table->timestamps();
          $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quote_products');
    }
};
