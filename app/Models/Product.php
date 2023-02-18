<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
  
class Product extends Model
{
    use HasFactory, SoftDeletes;
  
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
      'product_name',
      'product_cost',
      'product_general_price',
      'product_wholesale_price',
      'product_special_price',
      'product_barcode',
      'product_description',
      'product_image',

      'product_category_id',
      'product_brand_id',

      'created_by_id',
      'created_by_name',
      'updated_by_id',
      'updated_by_name',
    ];
}