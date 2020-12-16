<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'tbl_customer';
    protected $primaryKey = 'customer_id';
    protected $fillable = ['customer_name', 'customer_email', 'customer_password', 'customer_phone'];
}
