<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
      'category_name',
      'category_code',
      'category_note',

      'created_by_id',
      'created_by_name',
      'updated_by_id',
      'updated_by_name',
    ];
}
