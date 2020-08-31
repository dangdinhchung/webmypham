@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý shop</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{  route('admin.shop.index') }}"> Menu</a></li>
            <li class="active"> List </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th style="width: 10px">Stt</th>
                                <th style="width: 10px">ID</th>
                                <th>Name</th>
                                <th>Avatar</th>
                                <th>Status</th>
                                <th>Hot</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@stop