<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'tbl_brand_product';
    protected $primaryKey = 'brand_id';
    protected $fillable = ['brand_name', 'brand_desc', 'brand_status'];
}
