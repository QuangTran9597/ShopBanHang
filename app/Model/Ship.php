<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\City;
use App\Model\Province;
use App\Model\Wards;
class Ship extends Model
{
    protected $table = 'tbl_ship';
    protected $primaryKey = 'ship_id';
    protected $fillable = ['ship_matp', 'ship_maqh', 'ship_xaid', 'ship'];

    public function city(){
        return $this->belongsTo('App\Model\City', 'ship_matp');
    }
    public function province(){
        return $this->belongsTo('App\Model\Province', 'ship_maqh');
    }
    public function wards(){
        return $this->belongsTo('App\Model\Wards', 'ship_xaid');
    }
    public function ship_ship(){
        $ship = $this -> join('tbl_tinhthanhpho','tbl_ship.ship_matp', 'tbl_tinhthanhpho.matp')
         ->join('tbl_quanhuyen', 'tbl_ship.ship_maqh','tbl_quanhuyen.maqh')
         ->join('tbl_xaphuongthitran', 'tbl_ship.ship_xaid', 'tbl_xaphuongthitran.xaid')
         ->orderby('ship_id','desc')
         ->limit(8)->get();

        return $ship;
    }
    public function city_ship(){
        $city = City::orderby('matp' , 'ASC')->get();
        return $city;
    }
}
