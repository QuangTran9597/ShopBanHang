<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'tbl_quanhuyen';
    protected $primaryKey = 'maqh';
    protected $fillable = ['name_qhuyen', 'type', 'matp'];
}

