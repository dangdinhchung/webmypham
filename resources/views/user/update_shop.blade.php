@extends('layouts.app_master_user')
@section('css')
    <style>
        <?php $style = file_get_contents('css/user.min.css');echo $style;?>
    </style>
@stop
@section('content')
    <section>
        <div class="title">Cập nhật thông tin shop</div>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="sp_name" class="form-control" value="{{ $detailShop[0]->sp_name }}" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Địa chỉ</label>
                <input type="text" class="form-control" name="sp_address" value="{{ $detailShop[0]->sp_address }}" placeholder="Address">
            </div>
            <div class="from-group">
                <div class="upload-btn-wrapper">
                    <button class="btn-upload">Upload a file</button>
                    <input type="file" name="avatar" />
                </div>
            </div>

            <button type="submit" class="btn btn-blue btn-md">Submit</button>
        </form>
    </section>
@stop
