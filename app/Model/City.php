<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'tbl_tinhthanhpho';
    protected $primaryKey = 'matp';
    protected $fillable = ['name_thanhpho', 'type'];
}

