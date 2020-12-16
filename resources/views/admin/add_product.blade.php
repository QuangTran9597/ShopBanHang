@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm
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
                                <form role="form" action="{{URL::to('save-product')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1"
                                    placeholder="Tên sản phẩm" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Gía sản phẩm</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1"
                                    placeholder="Tên sản phẩm" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize:none" rows="4"  name="product_desc" class="form-control"
                                     id="ckeditor1" placeholder="Mô tả sản phẩm" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize:none" rows="4"  name="product_content" class="form-control"
                                     id="ckeditor2" placeholder="Mô tả sản phẩm" required></textarea>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                    <select name="product_cate" class="form-control input-sm m-bot15" >
                                        @foreach($cate_product as $key => $cate)
                                        <option value="{{ $cate->category_id }}" > {{ $cate->category_name }} </option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                                    <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach($brand_product as $key => $brand)
                                        <option value="{{ $brand->brand_id }}" >{{ $brand->brand_name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                        <option value="0" > Ẩn</option>
                                        <option value="1" >Hiển thị</option>

                                    </select>
                                </div>

                                <button type="submit"  name="add_product " class="btn btn-info">Thêm sản phẩm </button>
                            </form>
                            </div>

                        </div>
                    </section>
             </div>
</div>
@endsection
