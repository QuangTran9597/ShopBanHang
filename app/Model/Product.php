<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tbl_product';
    protected $primaryKey = 'product_id';
    protected $fillable = ['category_id', 'brand_id', 'product_name', 'product_desc',
    'product_content', 'product_price', 'product_image', 'product_status'];
}

