@extends('layouts.app_master_frontend')
@section('css')
    <style>
		<?php $style = file_get_contents('css/auth.min.css');echo $style;?>
        <?php $style = file_get_contents('css/user.min.css');echo $style;?>
        .upload-btn-wrapper .btn-upload {
            padding: 4px 20px;
            margin-bottom: 15px;
        }
    </style>
@stop
@section('content')
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li>
                    <a itemprop="url" href="/" title="Home"><span itemprop="title">Trang chủ</span></a>
                </li>
                <li>
                    <a itemprop="url" href="#" title="Đồng hồ chính hãng"><span itemprop="title">Account</span></a>
                </li>

                <li>
                    <a itemprop="url" href="#" title="Đăng ký"><span itemprop="title">Đăng ký</span></a>
                </li>

            </ul>
        </div>
        <div class="auth" style="background: white;">
            <form class="from_cart_register" action="" method="post" enctype="multipart/form-data" style="width: 500px;margin:0 auto;padding: 30px 0">
                @csrf
                <div class="form-group">
                    <label for="name">Name <span class="cRed">(*)</span></label>
                    <input name="name" id="name" type="text" value="{{  old('name') }}" class="form-control" placeholder="Nguyen Van A">
                    @if ($errors->first('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Email <span class="cRed">(*)</span></label>
                    <input name="email" id="email" type="email" value="{{  old('email') }}" class="form-control" autocomplete="off" placeholder="nguyenvana@gmail.com">
                    @if ($errors->first('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="phone">Password <span class="cRed">(*)</span></label>
                    <input name="password" id="password" type="password" placeholder="********" class="form-control">
                    @if ($errors->first('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="phone">Điện thoại <span class="cRed">(*)</span></label>
                    <input name="phone" id="phone" type="number" value="{{  old('phone') }}" placeholder="123456789" class="form-control">
                    @if ($errors->first('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="phone">Điạ chỉ <span class="cRed">(*)</span></label>
                    <input name="address" id="address" type="text" value="{{  old('address') }}" placeholder="Hà Nam" class="form-control">
                    @if ($errors->first('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                    @endif
                </div>
                {{--<div class="from-group"> <div class="upload-btn-wrapper"> <button class="btn-upload">Upload a file</button> <input type="file" name="avatar"> </div> </div>--}}
                <div class="col-sm-4">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <label for="phone" style="font-weight: 600;">Hình ảnh <span class="cRed">(*)</span></label>
                        </div>
                        <div class="box-body block-images" style="display: flex;">
                            <div style="margin-bottom: 10px">
                                <img src="/images/no-image.jpg" onerror="this.onerror=null;this.src='/images/no-image.jpg';" alt="" class="img-thumbnail" style="width: 100px;height: 100px;">
                            </div>
                            <div style="position:relative;margin-left: 20px;margin-top: 20px;">
                                <a class="btn btn-primary" href="javascript:;"> Choose File...
                                    <input type="file" style="position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:&quot;progid:DXImageTransform.Microsoft.Alpha(Opacity=0)&quot;;opacity:0;background-color:transparent;color:transparent;" name="avatar" size="40" class="js-upload">
                                </a> &nbsp;
                                <span class="label label-info" id="upload-file-info" style="display: none"></span> </div>
                        </div>
                        @if ($errors->first('avatar'))
                            <span class="text-danger">{{ $errors->first('avatar') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-purple">Đăng ký</button>
                    {{--<p>
                        <a href="{{ route('get.email_reset_password') }}">Quên mật khẩu</a>
                        <a href="{{ route('get.login') }}">Đăng nhập</a>
                    </p>--}}
                    @include('auth.include._inc_social')
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        <?php $js = file_get_contents('js/home.js');echo $js;?>
    </script>
@stop
