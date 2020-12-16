<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'tbl_order';
    protected $primaryKey = 'order_id';
    protected $fillable = ['customer_id', 'shipping_id', 'order_total', 'order_status', 'order_code','created_at'];

    

}
