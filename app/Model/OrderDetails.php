<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'tbl_order_details';
    protected $primaryKey = 'order_details_id';
    protected $fillable = ['order_id', 'product_id', 'product_name', 'product_price',
    'product_sales_quantity','product_ship'];

    public function product(){
        return $this->belongsTo('App\Model\Product','product_id');
    }

}
