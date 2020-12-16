<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    protected $table = 'tbl_xaphuongthitran';
    protected $primaryKey = 'xaid';
    protected $fillable = ['name_xaphuong', 'type', 'maqh'];
}

