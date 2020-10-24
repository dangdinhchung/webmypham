@extends('layouts.app_master_user')
@section('css')
    <style>
		<?php $style = file_get_contents('css/user.min.css');echo $style;?>
        
        .css-tooltip:hover:after {
            content: attr(data-tooltip);
            position: absolute;
            z-index: 1;
            bottom: 100%;
            right: 0;
            width: 100%;
            background-color: rgba(251, 88, 88, 0.86);
            font-size: 11px;
            line-height: 1.6em;
            font-weight: 400;
            text-decoration: none;
            text-transform: none;
            text-align: center;
            color: #fff;
            padding: 5px;
            border-radius: 5px;
        }
        .text-cancel {
            text-align: left;
        }
        .mr {
            margin-right: 10px;
        }
    </style>
@stop
@section('content')
    <section>
        <div class="title">Danh sách đơn hàng</div>
        <form class="form-inline">
            <div class="form-group " style="margin-right: 10px;">
                <input type="text" class="form-control" value="{{ Request::get('id') }}" name="id" placeholder="ID">
            </div>
            <div class="form-group" style="margin-right: 10px;">
                <select name="status" class="form-control">
                    <option value="">Trạng thái</option>
                    <option value="1" {{ Request::get('status') == 1 ? "selected='selected'" : "" }}>Tiếp nhận</option>
                    <option value="2" {{ Request::get('status') == 2 ? "selected='selected'" : "" }}>Đang vận chuyển
                    </option>
                    <option value="3" {{ Request::get('status') == 3 ? "selected='selected'" : "" }}>Đã bàn giao
                    </option>
                    <option value="-1" {{ Request::get('status') == -1 ? "selected='selected'" : "" }}>Huỷ bỏ</option>
                </select>
            </div>
            <div class="form-group" style="margin-right: 10px;">
                <button type="submit" class="btn btn-pink btn-sm">Tìm kiếm</button>
            </div>
        </form>
        <p style="font-style: italic;margin-bottom: 15px">Lưu ý : Bạn có thể hủy đơn hàng khi đang ở trạng thái tiếp nhận</p>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Mã đơn</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Kiểu thanh toán</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col" style="text-align: center">Export</th>
                        <th scope="col" style="text-align: center">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td scope="row" style="text-align: center;position:relative;" data-tooltip='Click để xem chi tiết' class="css-tooltip" >
                            <a href="{{ route('get.user.order', $transaction->id) }}">DH{{ $transaction->id }}</a>
                        </td>
                        <td style="text-align: center">{{ $transaction->tst_name }}</td>
                        <td style="text-align: center">{{ number_format($transaction->tst_total_money,0,',','.') }} đ</td>
                        <td>
                            <span class="label label-{{ $transaction->getType($transaction->tst_type)['class'] }}">
                                {{ $transaction->getType($transaction->tst_type)['name'] }}</span>
                        </td>
                        <td style="text-align: center">{{  $transaction->created_at->diffForHumans() }}</td>
                        <td style="text-align: center">
                            <span
                                class="label label-{{ $transaction->getStatus($transaction->tst_status)['class'] }}">
                                {{ $transaction->getStatus($transaction->tst_status)['name'] }}
                            </span>
                        </td>
                        <td style="text-align: center">
                            <a href="{{ route('ajax_get.user.invoice_transaction',$transaction->id) }}" target="_blank"
                               class="btn-xs label-success js-show-invoice_transaction" style="color: white"><i class="fa fa-save"></i> Export</a>
                        </td>
                        <td style="text-align: center">
                            @if (!in_array($transaction->tst_status , [-1,2,3]) )
                               {{-- <a href="{{ route('get.user.transaction.cancel',$transaction->id) }}"
                                   class="btn-xs label-danger" style="color: white"><i class="fa fa-save"></i> Huỷ đơn</a>--}}
                                <a data-href="{{ route('get.user.transaction.cancel',$transaction->id) }}" data-transaction="{{$transaction->id}}" class="btn-xs label-danger btn-cancel-order" style="color: white;cursor: pointer"><i class="fa fa-ban"></i> Huỷ đơn</a>
                           @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="display: block;">
            {!! $transactions->appends($query ?? [])->links() !!}
        </div>
    </section>

    {{--modal hủy đơn hàng--}}
    <div id="popup-cancel" class="modal text-center">
        <div class="header">Chọn lý do hủy đơn hàng</div>
        <div class="content">
            <div class="table-responsive">
                <form action="" method="POST">
                    @csrf
                <input type="hidden" name="id_update" id="id_update">
                <input type="hidden" name="url_route" id="url_route">
                 <table class="table-borderless">
                    <tbody>
                    <tr>
                        <td><input type="radio" class="mr" name="tst_reason" value="Thủ tục thanh toán quá rắc rối"> </td>
                        <td class="text-cancel">Thủ tục thanh toán quá rắc rối</td>
                    </tr>
                    <tr>
                        <td><input type="radio" class="mr" name="tst_reason" value="Tìm thấy giá rẻ hơn ở chỗ khác"> </td>
                        <td class="text-cancel">Tìm thấy giá rẻ hơn ở chỗ khác</td>
                    </tr>
                    <tr>
                        <td><input type="radio" class="mr" name="tst_reason" value="Đổi ý, không muốn mua nữa"> </td>
                        <td class="text-cancel">Đổi ý, không muốn mua nữa</td>
                    </tr>
                    <tr>
                        <td><input type="radio" class="mr" name="tst_reason" value="Lý do khác" checked> </td>
                        <td class="text-cancel">Lý do khác</td>
                    </tr>
                    </tbody>
                </table>
                    <a href="#" rel="modal:close" class="btn btn-pink ">Đóng</a>
                    <a href="" class="btn btn-purple js-cancel-order"> Hủy đơn hàng</a>
                </form>
            </div>

        </div>
    </div>
    {{--end modal hủy đơn hàng--}}
@stop

@section('script')
    {{--export--}}
    <div id="popup-transaction" class="modal text-center">
        <div class="header">Hoá đơn mua hang</div>
        <div class="content">

        </div>
        <div class="footer">
            <a href="#" rel="modal:close" class="btn btn-pink ">Đóng</a>
            <a href="" class="btn btn-purple js-export-pdf"> Export PDF</a>
        </div>
    </div>
    {{--lý do hủy đơn hàng--}}

@stop
