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
                                <th>Email</th>
                                <th>Tổng sản phẩm</th>
                                <th>Thuế</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @if (isset($sellers))
                                @foreach($sellers as $key => $seller)
                                    <tr>
                                        <td>{{ ($key + 1) }}</td>
                                        <td>{{ $seller->id }}</td>
                                        <td>{{ $seller->user->name }}</td>
                                        <td>{{ $seller->user->email }}</td>
                                        <td>{{ \App\Models\Product::where('pro_user_id', $seller->user->id)->count() }}</td>
                                        <td>
                                           {{  $seller->se_admin_to_pay }}
                                        </td>
                                        <td>
                                            @if ($seller->se_verification_status == 0)
                                                <a href="{{ route('admin.shop.active', $seller->id) }}" class="label label-info">
                                                    Requested
                                                </a>
                                            @else
                                                <a href="{{ route('admin.shop.active', $seller->id) }}" class="label label-default">
                                                    Verified
                                                </a>
                                            @endif
                                        </td>
                                        <td>{{  $seller->created_at }}</td>
                                      {{--  <td>
                                            <a href="{{ route('admin.slide.update', $shop->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="{{  route('admin.slide.delete', $shop->id) }}" class="btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i> Delete</a>
                                        </td>--}}
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@stop