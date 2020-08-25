@extends('layouts.app_master_admin')
@section('content')
    <style type="text/css">
        .percent {
            margin-right: 10%;
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
                    @include('admin.coupon.form')
                </div>
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@stop
<script src="{{  asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
@section('script')
    <script>
        {{--function get_products_by_subcategory(el) {--}}
        {{--    let category_id = $(el).val();--}}
        {{--    $(el).closest('.product-choose').find('.product_id').html(null);--}}
        {{--    $.post('{{ route('products.get_products_by_subsubcategory') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){--}}
        {{--        for (var i = 0; i < data.length; i++) {--}}
        {{--            $(el).closest('.product-choose').find('.product_id').append($('<option>', {--}}
        {{--                value: data[i].id,--}}
        {{--                text: data[i].pro_name--}}
        {{--            }));--}}
        {{--        }--}}
        {{--        $(el).closest('.product-choose').find('.product_id').select2();--}}
        {{--    });--}}
        {{--}--}}
    </script>
@stop