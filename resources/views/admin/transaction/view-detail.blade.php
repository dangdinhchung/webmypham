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
    @if($transactions->tst_status == 1)
        <div class="pad margin no-print">
            <div class="callout callout-info" style="margin-bottom: 0!important;">
                <h4><i class="fa fa-info"></i> Note:</h4>
               Đơn hàng chưa được xử lý
            </div>
        </div>
    @endif

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
            <div class="col-sm-3 invoice-col">
                Khách hàng
                <address>
                    <strong>{{$transactions->tst_name}}</strong><br>
                    Địa chỉ: {{$transactions->tst_address}} <br>
                    Phone: {{$transactions->tst_phone}}<br>
                    Email: {{$transactions->tst_email}}
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-3 invoice-col">
                Nhân viên xử lý đơn hàng
                @if($admins)
                <address>
                    <strong>{{$admins->name}}</strong><br>
                    Địa chỉ: {{$admins->address}} <br>
                    Phone: {{$admins->phone}}<br>
                    Email: {{$admins->email}}
                </address>
                @else
                    <br><strong>Đơn hàng chưa được nhân viên xử lý</strong>
                @endif
                @if($transactions->tst_status == -1 && $transactions->tst_admin_id <= 0)  <br><strong>(Khách hàng đã hủy đơn hàng)</strong> @endif
            </div>

            <div class="col-sm-3 invoice-col">
                Nhân viên vận chuyển
                @if($userShipping )
                <address>
                    <strong>{{$userShipping->name}}</strong><br>
                    Địa chỉ: {{$userShipping->address}} <br>
                    Phone: {{$userShipping->phone}}<br>
                    Email: {{$userShipping->email}}
                </address>
                @else
                    <br><strong>Không có</strong>
                @endif
            </div>


            <!-- /.col -->
            <div class="col-sm-3 invoice-col">
                <b>Invoice #{{$transactions->id}}</b><br>
                <b>Trạng thái đơn hàng:</b> <span class="label label-primary">{{$statusOrder}}</span><br>
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
            @if($transactions->tst_status == 2 && !$shipping && $checkShippingDay)
            <div class="col-xs-6">
                <p class="lead">Nhân viên vận chuyển</p>
                <form action="{{ route('admin.process-shipping') }}" id="form-wallet-1" name="shipping" method="POST">
                    @csrf
                    <input type="hidden" name="transaction_id" value="{{$transactions->id}}">
                    <div class="form-group ">
                        <select class="form-control" name="tst_shipping_id" id="shipping">
                            <option disabled selected>Hãy chọn nhân viên vận chuyển</option>
                            @foreach($checkShippingDay as $key => $item)
                            <option value="{{$item->id}}" {{ $transactions->tst_shipping_id == $item->id ? "selected='selected'" : "" }}>{{$item->name}} ({{$item->count_number}} đơn)</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-print"></i> Cập nhật</button>
                
                </form>

            </div>
            @else
              <div class="col-xs-6"></div>
            @endif
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
                <a href="{{ route('admin.transaction.index')}}" class="btn btn-info pull-right" style="margin-right: 20px;"> Quay lại</a>
                {{-- {{ route('ajax.admin.transaction.invoice', $transactions->id) }} --}}
                <a data-id="{{  $transactions->id }}" href="{{ route('ajax.admin.transaction.invoice', $transactions->id) }}" class="btn btn-info js-preview-invoice"><i class="fa fa-eye"></i> View</a>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
               {{-- <a href="{{ route('admin.process-shipping',$transactions->id)}}" data-transaction="{{$transactions->id}}" class="btn btn-success pull-right shipping-update"><i class="fa fa-print"></i> Cập nhật</a>
                <a href="{{ route('admin.transaction.index')}}" class="btn btn-info pull-right" style="margin-right: 20px;"> Quay lại</a>--}}
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


<div class="modal fade fade" id="modal-preview-invoice">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"> Hóa đơn bán hàng <b id="idTransaction">#1</b></h4>
            </div>
            <div class="modal-body">
                <div class="content">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <a href="" class="btn btn-success js-export-pdf"> Export PDF</a>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


@section('script')
<script src="{{ asset('js/cart.js') }}" type="text/javascript"></script>
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{  asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">

    </script> --}}
@stop
