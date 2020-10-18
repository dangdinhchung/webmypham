@extends('layouts.app_master_user')
@section('css')
    <style>
        <?php $style = file_get_contents('css/user.min.css');echo $style;?>
    </style>
@stop
@section('content')
    <section>
        <div class="title">Gui yeu cau xac thuc tai khoan</div>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <button type="submit" class="btn btn-blue btn-md">Xac thuc tai khoan</button>
        </form>

    </section>
@stop
