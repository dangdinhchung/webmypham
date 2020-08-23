@extends('layouts.app_master_admin')
@section('content')
    <style type="text/css">
        .add-more {
            float: right;
        }
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Thêm mới mã giảm giá</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{  route('admin.coupon.index') }}"> Coupon</a></li>
            <li class="active"> Create</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-body">
                    <form role="form" action="" method="POST">
                        @csrf
                        <div class="col-sm-8">
                            <div class="form-group {{ $errors->first('cp_code') ? 'has-error' : '' }}">
                                <label for="name">Mã giảm giá <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="cp_code"  placeholder="Coupon ...">
                                @if ($errors->first('cp_code'))
                                    <span class="text-danger">{{ $errors->first('cp_code') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->first('cp_discount') ? 'has-error' : '' }}">
                                <label for="name">Discount <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="cp_discount"  placeholder="Discount ...">
                                @if ($errors->first('cp_discount'))
                                    <span class="text-danger">{{ $errors->first('cp_discount') }}</span>
                                @endif
                            </div>
                            <div class="form-group" id="time">
                                <label for="exampleInputEmail1">Ngày bắt đầu</label>
                                <input type="text" class="form-control" name="cp_start_date" value="">
                            </div>
                            <div class="form-group" id="time">
                                <label for="exampleInputEmail1">Ngày kết thúc</label>
                                <input type="text" class="form-control" name="cp_end_date" value="">
                            </div>
                        </div>
                        <div class="col-sm-4 product-choose">
                            <div class="form-group ">
                                <label class="control-label">Danh mục <b class="col-red">(*)</b></label>
                                <select name="pro_category_id" class="form-control" required onchange="get_products_by_subcategory(this)">
                                    <option value="">__Click__</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{  $category->c_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->first('pro_category_id'))
                                    <span class="text-danger">{{ $errors->first('pro_category_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group ">
                                <label class="control-label">Sản phẩm <b class="col-red">(*)</b></label>
                                <select name="sub_category_ids[]" class="form-control product_id" required >
                                    {{--get list product by category here--}}
                                </select>
                            </div>
                            <hr>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info add-more">Add more</button>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="box-footer text-center"  style="margin-top: 20px;">
                                <a href="{{ route('admin.coupon.index') }}" class="btn btn-danger">
                                    Quay lại <i class="fa fa-undo"></i></a>
                                <button type="submit" class="btn btn-success">Lưu dữ liệu <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@stop
<script src="{{  asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
@section('script')
    <script>
        function get_products_by_subcategory(el) {
            let category_id = $(el).val();
            $(el).closest('.product-choose').find('.product_id').html(null);
            $.post('{{ route('products.get_products_by_subsubcategory') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
                for (var i = 0; i < data.length; i++) {
                    $(el).closest('.product-choose').find('.product_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].pro_name
                    }));
                }
                $(el).closest('.product-choose').find('.product_id').select2();
            });
        }
    </script>
@stop