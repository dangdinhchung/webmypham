@extends('layouts.app_master_admin')
@section('content')
    <section class="content-header">
        <h1>
            Invoice
            <small>#{{$transactions->id}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{  route('admin.transaction.index') }}">Transaction</a></li>
            <li class="active">Detail</li>
        </ol>
    </section>
  {{--  <div class="pad margin no-print">
        <div class="callout callout-info" style="margin-bottom: 0!important;">
            <h4><i class="fa fa-info"></i> Note:</h4>
            This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
        </div>
    </div>--}}
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> Chi tiết đơn hàng
                    <small class="pull-right">Thời gian: {{$dateNow}}</small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                Khách hàng
                <address>
                    <strong>{{$transactions->tst_name}}</strong><br>
                    {{$transactions->tst_address}} <br>
                    Phone: {{$transactions->tst_phone}}<br>
                    Email: {{$transactions->tst_email}}
                </address>
            </div>
            <!-- /.col -->

                <div class="col-sm-4 invoice-col">
                    Nhân viên xử lý đơn hàng
                    @if($admins)
                    <address>
                        <strong>{{$admins->name}}</strong><br>
                        {{$admins->address}} <br>
                        Phone: {{$admins->phone}}<br>
                        Email: {{$admins->email}}
                    </address>
                    @else
                        <br><strong>Đơn hàng chưa được nhân viên xử lý</strong>
                    @endif
                    @if($transactions->tst_status == -1 && $transactions->tst_admin_id <= 0)  <br><strong>(Khách hàng đã hủy đơn hàng)</strong> @endif
                </div>

            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Invoice #{{$transactions->id}}</b><br>
                <b>Trạng thái đơn hàng:</b> {{$statusOrder}}<br>
                <b>Kiểu thanh toán:</b> <span class="label label-info">{{$orderPay}}</span><br>
                <b>Thời gian mua:</b> {{ $transactions->created_at }}
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $totalMoney = 0;
                    @endphp
                    @foreach($orders as $key => $item)
                        @php
                            $itemTotal = $item->od_price * $item->od_qty;
                            $totalMoney += $itemTotal;
                        @endphp
                    <tr>
                        <td>#{{ $key + 1 }}.</td>
                        <td><a href="">{{ $item->product->pro_name ?? "[N\A]" }}</a></td>
                        <td>
                            <img alt="" style="width: 60px;height: 80px" src="{{ pare_url_file($item->product->pro_avatar ?? "") }}" class="lazyload">
                        </td>
                        <td>{{ number_format($item->od_price,0,',','.') }} đ</td>
                        <td>{{ $item->od_qty }}</td>
                        <td>{{ number_format($item->od_price * $item->od_qty,0,',','.') }} đ</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <p class="lead">Nhân viên vận chuyển</p>
               {{-- <img src="../../dist/img/credit/visa.png" alt="Visa">
                <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                <img src="../../dist/img/credit/american-express.png" alt="American Express">
                <img src="../../dist/img/credit/paypal2.png" alt="Paypal">--}}

               {{-- <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                </p>--}}

                    <div class="form-group ">
                        <select class="form-control" name="atb_type">
                            <option disabled selected>Hãy chọn nhân viên vận chuyển</option>
                            @foreach($adminRoles as $key => $item)
                            <option value="1">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

            </div>
            <!-- /.col -->
            <div class="col-xs-6">
                <p class="lead">Thanh toán</p>

                <div class="table-responsive">
                    <table class="table">
                        <tbody><tr>
                            <th style="width:50%">Tổng tiền hàng:</th>
                            <td>{{ number_format($totalMoney,0,',','.') }} đ</td>
                        </tr>
                        <tr>
                            <th>Phí vận chuyển:</th>
                            <td>{{ number_format(App\Models\Product::SHIPPING_COST,0,',','.') }} đ</td>
                        </tr>
                        @if(isset($couponDetail) && $couponDetail)
                            @php
                                $totalDiscount = floor($totalMoney * $couponDetail->cp_discount / 100);
                            @endphp
                            <tr>
                                <th>Giảm tối đa {{$couponDetail->cp_discount}} % (Code: {{$couponDetail->cp_code}})</th>
                                <td>-{{ number_format($totalDiscount,0,',','.') }} đ</td>
                            </tr>
                        @endif
                        <tr>
                            <th>Tổng tiền cần thanh toán:</th>
                            <td>{{ number_format($transactions->tst_total_money,0,',','.') }} đ</td>
                        </tr>
                        </tbody></table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a href="invoice-print.html" target="_blank" class="btn btn-success pull-right"><i class="fa fa-print"></i> Cập nhật</a>
               {{-- <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                </button>--}}
              {{--  <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                    <i class="fa fa-download"></i> Generate PDF
                </button>--}}
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
@stop