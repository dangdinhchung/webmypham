@extends('layouts.app_master_admin')
@section('content')
    <style type="text/css">

    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Mã giảm giá</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{  route('admin.coupon.index') }}"> Coupon</a></li>
            <li class="active"> List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-title">
                    <form class="form-inline">
                        <a href="{{ route('admin.coupon.create') }}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a>
                    </form>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th style="width: 10px">STT</th>
                                <th>Nội dung</th>
                                <th>Mã giảm giá</th>
                                <th>Loại mã</th>
                                <th>Số tiền / %</th>
                                <th>Số lần sử dụng</th>
                                {{--<th>Lịch sử</th>--}}
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @if (isset($coupons))
                                @foreach($coupons as $key => $coupon)
                                    <tr>
                                        <td>{{ (($coupons->currentPage() - 1) * $coupons->perPage()) + ( $key + 1)  }}</td>
                                        <td>{{ $coupon->cp_description ?? "[N\A]" }}</td>
                                        <td>{{ $coupon->cp_code ?? "[N\A]" }}</td>
                                        <td>
                                            @if ($coupon->cp_discount_type == 'percent')
                                                <span class="label label-info">%</span>
                                            @else
                                                <span class="label label-success">VNĐ</span>
                                            @endif
                                        </td>
                                        <td>{{ $coupon->cp_discount_type == 'amount' ? $coupon->cp_discount . " VNĐ" : $coupon->cp_discount . ' %'  }}</td>
                                        <td>{{ $coupon->cp_number_uses ?? "[N\A]" }}</td>
                                        {{--<td>
                                            <a class="btn btn-xs btn-default grid-expand collapsed" data-inserted="0" data-key="1" href="#{{$key}}" data-toggle="collapse"  aria-expanded="false">
                                                <i class="fa fa-caret-right"></i> Lịch sử sử dụng
                                            </a>
                                        </td>--}}
                                        <td>{{ date("Y-m-d", $coupon->cp_start_date) ?? "[N\A]" }}</td>
                                        <td>{{ date("Y-m-d", $coupon->cp_end_date) ?? "[N\A]" }}</td>
                                        <td>
                                            @if ($coupon->cp_active == 1)
                                                <a href="{{ route('admin.coupon.active', $coupon->id) }}" class="label label-info">Active</a>
                                            @else
                                                <a href="{{ route('admin.coupon.active', $coupon->id) }}" class="label label-default">Hide</a>
                                            @endif
                                        </td>
                                        <td style="width: 160px;">
                                            <a href="{{ route('admin.coupon.update', $coupon->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="{{  route('admin.coupon.delete', $coupon->id) }}" class="btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    {{--<tr>
                                        <td colspan="12" style="padding:0 !important; border:0px;">
                                            <div class="collapse" id="{{$key}}">
                                                <br>
                                                <span style="padding-left:20px;">
                                                    <i class="fa fa-angle-double-right"></i>
                                                    Khách hàng ID2 dùng lúc 2018-05-21 05:04:28.  Nội dung: Đơn hàng 3
                                                </span>
                                                <br>
                                                <br>
                                            </div>
                                        </td>
                                    </tr>--}}
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! $coupons->links() !!}
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@stop
