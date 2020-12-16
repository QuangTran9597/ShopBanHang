@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Vận chuyển
                        </header>
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                 {{ session()->get('message') }}
                            </div>
                            @elseif(session()->has('error'))
                                <div class="alert alert-danger">
                                {{ session()->get('error') }}
                                </div>
                            @endif
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="{{route('insert-delivery')}}" method="post">
                                    @csrf

                                <div class="form-group">
                                     <label for="exampleInputPassword1">Chọn thành phố</label>
                                        <select name="city" id="city" class="form-control input-sm m-bot15 choose city " required>
                                            <option value="0" > --Chọn tỉnh thành phố--</option>
                                            @foreach ($city as $ci)
                                            <option  value="{{$ci->matp}}">{{$ci->name_thanhpho}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
                                     <label for="exampleInputPassword1">Chọn quận huyện</label>
                                        <select name="province" id="province" class="form-control input-sm m-bot15 choose province " required>
                                            <option  value="0" > --Chọn quận huyện-- </option>
                                        </select>
                                </div>
                                <div class="form-group">
                                     <label for="exampleInputPassword1">Chọn xã phường</label>
                                        <select name="wards" id="wards" class="form-control input-sm m-bot15 wards " required>
                                            <option  value="0" > --Chọn xã phường-- </option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phí vận chuyển</label>
                                    <input type="text" name="ship" class="form-control ship" id="exampleInputEmail1"
                                     placeholder="Phi van chuyen" required>
                                </div>
                                <button type="submit"  name="add_delivery " class="btn btn-primary add_delivery">Thêm phí vận chuyển </button>
                            </form>
                            </div>


                                <div id="load_delivery" style="margin-top:40px">
                                    <div class="table-reponsive">
                                        <table class="table table-bordered ship_edit">
                                            <thead>
                                                <tr class="ship_byid">
                                                    <th>Tên thành phố</th>
                                                    <th>Tên quận huyện</th>
                                                    <th>Tên xã phường</th>
                                                    <th>Gía ship</th>
                                                </tr>

                                                @foreach($ship as $key => $value)
                                                <tr>
                                                        <td>{{ $value->name_thanhpho }}</td>
                                                        <td>{{ $value->name_qhuyen }}</td>
                                                        <td>{{ $value->name_xaphuong }}</td>
                                                        <td class="ship_edit" data-ship_id="ship_edit" ship_id="{{$value->ship_id }}"  >{{number_format($value->ship,0,',','.') }}k</td>

                                                </tr>
                                                @endforeach
                                                </thead>
                                            </table>
                                        </div>
                                    </div>

                                 </div>
                    </section>
             </div>
</div>
@endsection
