@extends('layouts.app_master_admin')
@section('content')
    <style type="text/css">
        .select2-selection__choice {
            color: black !important;
        }
    </style>
    <link rel="stylesheet" href="{{  asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Thêm mới sự kiện Flash Sale</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{  route('admin.flash.index') }}"> Coupon</a></li>
            <li class="active"> Create</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-body">
                    <form role="form" action="" method="POST" id="form-flash-sale">
                        @csrf
                        <div class="col-sm-8">
                            <div class="form-group {{ $errors->first('fs_title') ? 'has-error' : '' }}">
                                <label for="name">Tiêu đề<span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="fs_title" value="{{ $flashSale->fs_title ?? old('fs_title') }}"  placeholder="Sự kiện tháng 9...">
                                @if ($errors->first('fs_title'))
                                    <span class="text-danger">{{ $errors->first('fs_title') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->first('fs_start_date') ? 'has-error' : '' }}" id="time1">
                                <label for="exampleInputEmail1">Ngày bắt đầu</label>
                                <input type="date" class="form-control" name="fs_start_date" value="{{  isset($flashSale) ? date("Y-m-d",$flashSale->fs_start_date) : old('fs_start_date') }}">
                                @if ($errors->first('fs_start_date'))
                                    <span class="text-danger">{{ $errors->first('fs_start_date') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->first('fs_end_date') ? 'has-error' : '' }}" id="time2">
                                <label for="exampleInputEmail1">Ngày kết thúc</label>
                                <input type="date" class="form-control" name="fs_end_date" value="{{  isset($flashSale) ? date("Y-m-d",$flashSale->fs_end_date) : old('fs_end_date') }}">
                                @if ($errors->first('fs_end_date'))
                                    <span class="text-danger">{{ $errors->first('fs_end_date') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Sản phẩm</label>
                                    <select name="products[]" id="products" class="form-control demo-select2" multiple data-placeholder="Choose Products">
                                        @foreach(\App\Models\Product::all() as $product)
                                            <option value="{{$product->id}}">{{__($product->pro_name)}}</option>
                                        @endforeach
                                    </select>
                                    <i class="txt-note-sale" style="color: red;font-size: 12px;">Lưu ý: Bạn cần phải chọn ít nhất 4 sản phẩm cho sự kiện flash sale !</i>
                            </div>
                            <br>
                            <div class="form-group" id="discount_table">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="box-footer text-center"  style="margin-top: 20px;">
                                <a href="{{ route('admin.flash.index') }}" class="btn btn-danger">
                                    Quay lại <i class="fa fa-undo"></i></a>
                                <button type="submit" class="btn btn-success btn-flash">Lưu dữ liệu <i class="fa fa-save"></i></button>
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
<script src="{{  asset('admin/bower_components/select2/dist/js/select2.min.js') }}"></script>
@section('script')
    <script type="text/javascript">
        $(".demo-select2").select2();
        $(document).ready(function(){
            $('#products').on('change', function(){
                var product_ids = $('#products').val();
                if(product_ids.length > 0){
                    $.post('{{ route('flash_sales.product_discount') }}', {_token:'{{ csrf_token() }}', product_ids:product_ids}, function(data){
                        $('#discount_table').html(data);
                        $('.demo-select2').select2();
                    });
                }
                else{
                    $('#discount_table').html(null);
                }
            });

            //click btn flash
            
             $('.btn-flash').on('click', function(event ){
                event.preventDefault();
                let fs_title = $("input[name*='fs_title']").val();
                let fs_start_date = $("input[name*='fs_start_date']").val();
                let fs_end_date = $("input[name*='fs_end_date']").val();
                if(fs_title == "") {
                    alert(11111111);
                } else {
                    $( "#form-flash-sale" ).submit();
                }

            });
        });

    </script>
@stop