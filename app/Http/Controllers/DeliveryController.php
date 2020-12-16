<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\City as AppCity;
use Illuminate\Http\Request;
use App\Model\City;
use App\Model\Province;
use App\Model\Wards;
use App\Model\Ship;

class DeliveryController extends Controller
{

    public function __construct(Ship $ship)
    {
        $this -> Ship = $ship;
    }
    public function insert_delivery(Request $request){
        $data = $request->all();
        $ship_pp = new Ship();
        $ship_pp->ship_matp = $data['city'];
        $ship_pp->ship_maqh = $data['province'];
        $ship_pp->ship_xaid = $data['wards'];
        $ship_pp->ship = $data['ship'];
        $ship_pp->save();
        $ship = $this->Ship->ship_ship();
        $city = $this->Ship->city_ship();
        // dd($data);

        session()->put('message', 'Thêm phí vận chuyển thành công ');
       return view('delivery.add_delivery')->with(compact('city','ship'));


   }

//    public function select_ship(){
//        $ship = Ship::orderby('ship_id','DESC')->get();
//        return view('delivery.add_delivery')->with(compact('ship'));

//         $output = '';
//         $output.= '<div class="table-responsive">
//                 <table class="table table-bordered">
//                     <thead>
//                         <tr>
//                             <th>Tên thành phố</th>
//                             <th>Tên quận huyện</th>
//                             <th>Tên xã phường</th>
//                             <th>Phí ship</th>
//                         </tr>
//                     </thead>
//                     <tbody>
//                     ';

//                      foreach($ship as $value){
//                      $output.='
//                         <tr>
//                             <td>'.$value->city->name_city.'</td>
//                             <td>'.$value->province->name_quanhuyen.'</td>
//                             <td>'.$value->wards->name_xaphuong.'</td>
//                             <td contenteditable data-ship_id="'.$value->ship_id.'" >'.number_format( $value->ship->ship,0, ',' , '.' ).'</td>
//                         </tr>
//                         ';
//                         }
//                         $output.='
//                         </tbody>
//                         </table></div>
//                         ';
//                      echo $output;

//    }

    public function delivery(){
        // $city = City::orderby('matp' , 'ASC')->get();
        // $ship = Ship::join('tbl_tinhthanhpho','tbl_ship.ship_matp', 'tbl_tinhthanhpho.matp')
        // ->join('tbl_quanhuyen', 'tbl_ship.ship_maqh','tbl_quanhuyen.maqh')
        // ->join('tbl_xaphuongthitran', 'tbl_ship.ship_xaid', 'tbl_xaphuongthitran.xaid')->limit(8)->get();

         $ship = $this->Ship->ship_ship();
         $city = $this->Ship->city_ship();
        return view('delivery.add_delivery')->with(compact('city','ship'));

        // $city = City::orderby('matp' , 'ASC')->get();
        // return view('delivery.add_delivery')->with(compact('city'));


    }

    public function select_delivery(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh', 'ASC')->get();
                $output.='<option>--Chọn quận huyện--</option>';
                foreach($select_province as  $province){
                $output.='<option value="'.$province->maqh.'" >'.$province->name_qhuyen.'</option>';
                }
            }else{

                $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid', 'ASC')->get();
                $output.='<option>--Chọn xã phường--</option>';
                foreach($select_wards as  $wards){
                $output.='<option value="'.$wards->xaid.'">'.$wards->name_xaphuong.'</option>';
                }
            }
        } echo $output;
    }


}
