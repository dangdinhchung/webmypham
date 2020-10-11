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
        <h1>Sửa sự kiện Flash Sale</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{  route('admin.flash.index') }}"> Flash sale</a></li>
            <li class="active"> Create</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-body">
                    <form role="form" action="" method="POST" id="form-flash-sale-edit">
                        @csrf
                        <div class="col-sm-8">
                            <div class="form-group {{ $errors->first('fs_title') ? 'has-error' : '' }}">
                                <label for="name">Tiêu đề<span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control fs_title" name="fs_title" value="{{ $flashSale->fs_title ?? old('fs_title') }}"  placeholder="Sự kiện tháng 9...">
                                <span class="text-danger fs_title"></span>
                            </div>
                            <div class="form-group {{ $errors->first('fs_start_date') ? 'has-error' : '' }}" id="time1">
                                <label for="exampleInputEmail1">Ngày bắt đầu<span class="text-danger">(*)</span></label>
                                <input type="date" class="form-control fs_start_date" name="fs_start_date" value="{{  isset($flashSale) ? date("Y-m-d",$flashSale->fs_start_date) : old('fs_start_date') }}">
                                 <span class="text-danger fs_start_date"></span>
                            </div>
                            <div class="form-group {{ $errors->first('fs_end_date') ? 'has-error' : '' }}" id="time2">
                                <label for="exampleInputEmail1">Ngày kết thúc<span class="text-danger">(*)</span></label>
                                <input type="date" class="form-control fs_end_date" name="fs_end_date" value="{{  isset($flashSale) ? date("Y-m-d",$flashSale->fs_end_date) : old('fs_end_date') }}">
                                 <span class="text-danger fs_end_date"></span>
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Sản phẩm <span class="text-danger">(*)</span></label>
                                    <select name="products[]" id="products" class="form-control demo-select2" multiple required="" data-placeholder="Choose Products">
                                        @foreach(\App\Models\Product::all() as $product)
                                         @php
                                                $flash_sale_product = \App\Models\FlashSaleProduct::where('fsp_flash_deal_id', $flashSale->id)->where('fsp_product_id', $product->id)->first();
                                        @endphp
                                            <option value="{{$product->id}}" <?php if($flash_sale_product != null) echo "selected";?> >{{__($product->pro_name)}}</option>
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
             get_flash_deal_discount();
              $('#products').on('change', function(){
                get_flash_deal_discount();
            });

            function get_flash_deal_discount(){
                var product_ids = $('#products').val();
                if(product_ids.length > 0){
                    $.post('{{ route('flash_sales.product_discount_edit') }}', {_token:'{{ csrf_token() }}', product_ids:product_ids, flash_sale_id:{{ $flashSale->id }}}, function(data){
                        $('#discount_table').html(data);
                        $('.demo-select2').select2();
                    });
                }
                else{
                    $('#discount_table').html(null);
                }
            }

            //click btn flash
            
             $('.btn-flash').on('click', function(event ){
                event.preventDefault();
                let product_ids = $('#products').val();
                let fs_title = $("input[name*='fs_title']").val();
                let fs_start_date = $("input[name*='fs_start_date']").val();
                let fs_end_date = $("input[name*='fs_end_date']").val();
                let today = new Date().toLocaleDateString();
                let convertToday = Date.parse(today);
                let convertStartDate = Date.parse(fs_start_date);
                let convertEndDate = Date.parse(fs_end_date);
                $('.fs_title').text('');
                $('.fs_title').css('border-color','#d2d6de');
                $('.fs_start_date').text('');
                $('.fs_start_date').css('border-color','#d2d6de');
                $('.fs_end_date').text('');
                $('.fs_end_date').css('border-color','#d2d6de');
                $('.fs_product_discounts').text('');
                if(fs_title == "") {
                    $('.fs_title').text('Dữ liệu không được bỏ trống');
                    $('.fs_title').css('border-color','red');
                } else if(fs_start_date == "") {
                    $('.fs_start_date').text('Dữ liệu không được bỏ trống');
                    $('.fs_start_date').css('border-color','red');
                 } else if(convertStartDate < convertToday) {
                    $('.fs_start_date').text('Ngày bắt đầu >= ngày hiện tại');
                    $('.fs_start_date').css('border-color','red');
                 } else if(fs_end_date == "") {
                    $('.fs_end_date').text('Dữ liệu không được bỏ trống');
                    $('.fs_end_date').css('border-color','red');
                } else if(convertEndDate < convertStartDate) {
                    $('.fs_end_date').text('Ngày kết thúc >= ngày hiện tại');
                    $('.fs_end_date').css('border-color','red');
                 } else if(product_ids.length < 4) {
                    $('.select2-selection--multiple').css('border','1px solid red');
                } else {
                    $( "#form-flash-sale-edit" ).submit();
                }
                //ngày kết thúc >= ngày hiện tại

            });
        });

    </script>
@stop