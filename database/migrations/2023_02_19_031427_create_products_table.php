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
        Schema::create('products', function (Blueprint $table) {
          $table->id();
          $table->string('product_name');
          $table->string('product_cost');
          $table->string('product_general_price');
          $table->string('product_wholesale_price');
          $table->string('product_special_price');
          $table->string('product_barcode');
          $table->string('product_description');
          $table->string('product_image')->nullable()->default(NULL);

          $table->foreignId('category_id')->nullable()->default(1)->constrained('categories');
          $table->foreignId('brand_id')->nullable()->default(1)->constrained('brands');

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
        Schema::dropIfExists('products');
    }
};
