@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý Flash Sale</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{  route('admin.flash.index') }}"> Flash Sale</a></li>
            <li class="active"> List </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="{{ route('admin.flash.create') }}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th style="width: 10px">STT</th>
                                <th style="width: 10px">ID</th>
                                <th>Tiêu đề</th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th>Trạng thái</th>
                                <th>Thời gian tạo</th>
                                <th>Action</th>
                            </tr>
                            </tbody>
                            @if (isset($flashSales))
                                @foreach($flashSales as $key => $flashSale)
                                    <tr>
                                        <td>{{ (($flashSales->currentPage() - 1) * $flashSales->perPage()) + ( $key + 1)  }}</td>
                                        <td>{{ $flashSale->id }}</td>
                                        <td>{{ $flashSale->fs_title }}</td>
                                        <td>{{ date('d-m-Y',$flashSale->fs_start_date) }}</td>
                                        <td>{{ date('d-m-Y',$flashSale->fs_end_date) }}</td>
                                        <td>
                                            @if ($flashSale->fs_status == 1)
                                                <a href="{{ route('admin.flash.active', $flashSale->id) }}" class="label label-info">Hiện</a>
                                            @else
                                                <a href="{{ route('admin.flash.active', $flashSale->id) }}" class="label label-default">Ẩn</a>
                                            @endif
                                        </td>
                                        <td>{{  $flashSale->created_at }}</td>
                                        <td style="width: 120px">
                                            <a href="{{ route('admin.flash.update', $flashSale->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="{{  route('admin.flash.delete', $flashSale->id) }}" class="btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@stop