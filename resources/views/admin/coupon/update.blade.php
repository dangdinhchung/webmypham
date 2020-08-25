@extends('layouts.app_master_admin')
@section('content')
    <style type="text/css">
        .percent {
            margin-right: 10%;
        }
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Cập nhật mã giảm giá</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{  route('admin.coupon.index') }}"> Coupon</a></li>
            <li class="active"> Update</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="box-body">
                    @include('admin.coupon.form')
                </div>
            </div>
    </section>
    <!-- /.content -->
@stop