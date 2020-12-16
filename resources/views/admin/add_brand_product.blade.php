@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm thương hiệu
                        </header>
                        <?php
                                $message = session()->get('message');
                                if($message) {
                                    echo $message;
                                    $request->session()->put('message', $null);
                                }
                            ?>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="{{URL::to('save-brand-product')}}" method="post">
                                    {{csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" name="brand_product_name" class="form-control"
                                    id="exampleInputEmail1" placeholder="Tên thương hiệu" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                    <textarea style="resize:none" rows="5"  name="brand_product_desc" class="form-control"
                                    id="exampleInputPassword1" placeholder="Mô tả thương hiệu" required></textarea>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="brand_product_status" class="form-control input-sm m-bot15" required>
                                        <option value="0" > Ẩn</option>
                                        <option value="1" >Hiển thị</option>

                                    </select>
                                </div>

                                <button type="submit"  name="add_brand_product " class="btn btn-info">Thêm danh mục </button>
                            </form>
                            </div>

                        </div>
                    </section>
             </div>
</div>
@endsection
