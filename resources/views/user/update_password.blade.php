@extends('layouts.app_master_user')
@section('css')
    <style>
        <?php $style = file_get_contents('css/user.min.css');echo $style;?>
    </style>
@stop
@section('content')
    <section>
        <div class="title">Cập nhật mật khẩu</div>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Mật khẩu cũ</label>
                <input type="password" name="password_old" class="form-control" value="" placeholder="********">
                @if ($errors->first('password_old'))
                    <span class="text-danger">{{ $errors->first('password_old') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="">Mật khẩu mới</label>
                <input type="password" name="password" class="form-control" value="" placeholder="********">
                @if ($errors->first('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="">Nhập lại mật khẩu mới</label>
                <input type="password" name="re_password" class="form-control" value="" placeholder="********">
                @if ($errors->first('re_password'))
                    <span class="text-danger">{{ $errors->first('re_password') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-blue btn-md">Submit</button>
        </form>

    </section>
@stop
