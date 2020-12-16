@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê đơn hàng
    </div>
    <div class="row w3-res-tb">

    </div>
    <div class="table-responsive">
                           
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>

            <th>Thứ tự</th>
            <th>Mã đơn hàng</th>
            <th>Tình trạng đơn hàng</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @php
                $i = 0 ;
            @endphp
            @foreach($order as $key => $value)
          <tr>
            <td><i>{{$i++}}</i></label></td>
            <td>{{ $value->order_code}}</td>
            <td>@if($value->order_status==1)
                        Đơn hàng mới
                @else
                        Đã xử lý
                @endif

            </td>

            <td>
              <a href="{{url('view-order/'.$value->order_code)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-eye text-success text-active"></i></a>
              <a onclick="return confirm('Are you sure to delete?')" href="{{url('delete-order/'.$value->order_code)}}" class="active styling-delete" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
