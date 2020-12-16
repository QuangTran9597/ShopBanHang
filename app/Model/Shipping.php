<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'tbl_shipping';
    protected $primaryKey = 'shipping_id';
    protected $fillable = ['shipping_name', 'shipping_address', 'shipping_phone', 'shipping_email',
    'shipping_note', 'shipping_method' ];

}
