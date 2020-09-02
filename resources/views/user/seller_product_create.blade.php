@extends('layouts.app_master_user')
@section('css')
    <style>
        <?php $style = file_get_contents('css/user.min.css');echo $style;?>
        .col-seller:not(:last-child){
            margin-right: 28px;
        }
        textarea {
            min-height: 90px !important;
        }
        .col-sm-3 {
            width: 25%;
        }
    </style>
@stop
@section('content')
    <section>
        <div class="title">Thêm mới sản phẩm</div>
        @include('user.seller_product_form')
    </section>
@stop
@section('script')
<script src="{{  asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">

    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };

    CKEDITOR.replace( 'content' ,options);

    // preview  hình ảnh
    $(".js-upload").change(function () {
        let $this = $(this);
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $this.parents('.block-images').find('img').attr('src', e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@stop