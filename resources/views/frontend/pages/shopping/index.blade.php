@extends('layouts.app_master_frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/cart.min.css') }}">
    <style type="text/css">
        .cart .left .list__content .qty_number .btn-action-delete {
            background: none;
            border: none;
        }
        .ic-coupon {
            color: #888;
            font-size: initial;
        }
        .form-coupon {
            width: 30% !important;
        }
        .ds-flex {
            display: flex;
        }
        .input-group-addon {
            margin-left: 10px;
            cursor: pointer;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 400;
            color: #555;
            background-color: #eee;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: table-cell;
        }
        @media (max-width: 767px) {
            .name-product {
                width: 300px;white-space: normal;
            }
        }

    </style>
@stop
@section('content')
    <div class="container cart">
        <div class="left">
            <div class="list">
                <div class="title">THÔNG TIN GIỎ HÀNG</div>
                <div class="list__content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 100px;"></th>
                            <th style="width: 30%">Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($shopping as $key => $item)
                                <tr>
                                    <td>
                                        <a href="{{ route('get.product.detail',\Str::slug($item->name).'-'.$item->id) }}"
                                            title="{{ $item->name }}" class="avatar image contain">
                                            <img alt="" src="{{ pare_url_file($item->options->image) }}" class="lazyload">
                                        </a>
                                    </td>
                                    <td>
                                        <div style="" class="name-product">
                                            <a href="{{ route('get.product.detail',\Str::slug($item->name).'-'.$item->id) }}"><strong>{{ $item->name }}</strong></a>
                                        </div>
                                    </td>
                                    <td>
                                        <p><b>{{  number_format($item->price,0,',','.') }} đ</b></p>
                                        <p>

                                            @if ($item->options->price_old)
                                                <span style="text-decoration: line-through;">{{  number_format(number_price($item->options->price_old),0,',','.') }} đ</span>
                                                <span class="sale">- {{ $item->options->sale }} %</span>
                                            @endif
                                        </p>
                                    </td>
                                    <td>
                                        <div class="qty_number">
                                            <input type="number"  min="1" class="input_quantity" disabled name="quantity_14692" value="{{  $item->qty }}" id="">
                                            <p data-price="{{ $item->price }}" data-url="{{  route('ajax_get.shopping.update', $key) }}" data-id-product="{{  $item->id }}">
                                                <span class="js-increase">+</span>
                                                <span class="js-reduction">-</span>
                                            </p>
                                            <a href="{{  route('get.shopping.delete', $key) }}" class="js-delete-item btn-action-delete"><i class="la la-trash ic-coupon"></i></a>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="js-total-item">{{ number_format($item->price * $item->qty,0,',','.') }} đ</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputGroupSuccess3"><i class="fa fa-exchange" aria-hidden="true"></i> Mã giảm giá </label>
                        <div class="input-group ds-flex">
                            <input type="text" placeholder="Nhập mã giảm giá" class="form-control form-coupon" id="coupon-value" aria-describedby="inputGroupSuccess3Status">
                            <span class="input-group-addon"  id="coupon-button" href="{{ route('checkout.apply_coupon_code') }}" style="cursor: pointer;" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Đang kiểm tra">Kiểm tra</span>
                        </div>
                        <span class="status-coupon" style="display: none;" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                        <div class="coupon-msg" style="text-align: left;padding-left: 10px;"></div>
                    </div>

                    <p style="float: right;margin-top: 20px;">Tổng tiền : <b id="sub-total">{{ \Cart::subtotal(0) }} đ</b></p>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="customer">
                <div class="title">THÔNG TIN ĐẶT HÀNG</div>
                <div class="customer__content">
                    <form class="from_cart_register" action="{{ route('post.shopping.pay') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name" >Họ và tên <span class="cRed">(*)</span></label>
                            <input name="tst_name" id="name" required="" value="{{ get_data_user('web','name') }}" type="text" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="phone">Điện thoại <span class="cRed">(*)</span></label>
                            <input name="tst_phone" id="phone" required="" value="{{ get_data_user('web','phone') }}" type="text" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ <span class="cRed">(*)</span></label>
                            <input name="tst_address" id="address" required="" value="{{ get_data_user('web','address') }}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="cRed">(*)</span></label>
                            <input name="tst_email" id="email" required="" value="{{ get_data_user('web','email') }}" type="text" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="note">Ghi chú thêm</label>
                            <textarea name="tst_note" id="note" cols="3" style="min-height: 100px;" rows="2" class="form-control"></textarea>
                        </div>
                        <div class="btn-buy">
                            <button class="buy1 btn btn-purple {{ \Auth::id() ? '' : 'js-show-login' }}" style="width: 100%;border-radius: 5px" type="submit" name="pay" value="transfer">
                                Thanh toán khi nhận hàng
                            </button>
                        </div>
                        @php
                            $totalMoney = str_replace(',','',\Cart::subtotal(0));
                        @endphp
                        <div class="btn-buy" style="margin-top: 10px">
                            <button class="buy1 btn btn-pink {{ \Auth::id() ? '' : 'js-show-login' }} {{ $totalMoney > get_data_user('web','balance') ? 'js-popup-wallet' : '' }}" style="width: 100%;border-radius: 5px" type="submit" name="pay" value="online">
                                Thanh toán Online
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
@section('script')
    <script src="{{ asset('js/cart.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $('#coupon-button').click(function() {
            var coupon = $('#coupon-value').val();
            let Url = $(this).attr('href');
            console.log(Url,111111);
            if(coupon==''){
                $('.coupon-msg').html('Bạn chưa nhập mã giảm giá').addClass('text-danger').show();
            }else{
                $('#coupon-button').button('loading');
                setTimeout(function() {
                    $.ajax({
                        url: Url,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            cp_code: coupon,
                            _token: "{{ csrf_token() }}",
                        },
                    })
                        .done(function(result) {
                            $('#coupon-value').val('');
                            $('.coupon-msg').removeClass('text-danger');
                            $('.coupon-msg').removeClass('text-success');
                            $('.coupon-msg').hide();
                            if(result.error ==1){
                                $('.coupon-msg').html(result.msg).addClass('text-danger').show();
                            }else{
                                $('#removeCoupon').show();
                                $('.coupon-msg').html(result.msg).addClass('text-success').show();
                                $('.showTotal').remove();
                                $('#showTotal').prepend(result.html);
                            }
                        })
                        .fail(function() {
                            console.log("error");
                        });
                    $('#coupon-button').button('reset');
                }, 2000);
            }
        });
    </script>
@stop
