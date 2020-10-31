@extends('layouts.app_master_frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/cart.min.css') }}">
    <style type="text/css">
        .cart .left .list__content .qty_number .btn-action-delete {
            background: none;
            border: none;
        }

        .cart .right {
            width: 50%;
        }

        .cart .left {
            width: 50%;
        }

        .image img {
            width: 77%;
            height: 10%;
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

        .list__content {
            border: none !important;
        }

        .table > tbody > tr > th, .table > tbody > tr > td {
            border-top: none !important;
            text-align: center;
        }
        .hidden {
            display: none;
        }

        .has-error {
            border-color: red;
        }

        @media (max-width: 767px) {
            .name-product {
                width: 300px;
                white-space: normal;
            }
        }

    </style>
@stop
@section('content')
    <div class="container cart">
        <div class="left">
            <div class="customer">
                <div class="title">THÔNG TIN ĐẶT HÀNG</div>
                <div class="customer__content">
                    <form class="from_cart_register" action="{{ route('post.shopping.pay') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Họ và tên <span class="cRed">(*)</span></label>
                            {{--{{ get_data_user('web','name') }}--}}
                            <input name="tst_name" id="name"  value="{{ old('tst_name') }}"
                                   type="text" class="form-control {{ $errors->first('tst_name') ? 'has-error' : '' }}">
                            @if ($errors->first('tst_name'))
                                <span class="text-danger">{{ $errors->first('tst_name') }}</span>
                            @endif
{{--                            <span class="text-danger tst_name"></span>--}}
                        </div>
                        <div class="form-group">
                            <label for="phone">Điện thoại <span class="cRed">(*)</span></label>
                            <input name="tst_phone" id="phone" value="{{old('tst_phone')}}"
                                   type="text" class="form-control {{ $errors->first('tst_phone') ? 'has-error' : '' }}">
                            @if ($errors->first('tst_phone'))
                                <span class="text-danger">{{ $errors->first('tst_phone') }}</span>
                            @endif
{{--                            <span class="text-danger tst_phone"></span>--}}
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ <span class="cRed">(*)</span></label>
                            <input name="tst_address" id="address"
                                   value="{{ old('tst_address') }}" type="text" class="form-control {{ $errors->first('tst_address') ? 'has-error' : '' }}">
                            @if ($errors->first('tst_address'))
                                <span class="text-danger">{{ $errors->first('tst_address') }}</span>
                            @endif
{{--                            <span class="text-danger tst_address"></span>--}}
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="cRed">(*)</span></label>
                            <input name="tst_email" id="email" type="text" value="{{ old('tst_email') }}" class="form-control {{ $errors->first('tst_email') ? 'has-error' : '' }}">
                            @if ($errors->first('tst_email'))
                                <span class="text-danger">{{ $errors->first('tst_email') }}</span>
                            @endif
{{--                            <span class="text-danger tst_email"></span>--}}
                        </div>
                        <div class="form-group">
                            <label for="email">Hình thức thanh toán</label>
                            <select name="tst_type" id="tst_type" class="form-control">
                                <option value="1">Thanh toán khi nhận hàng</option>
                                <option value="2">Thanh toán VNPAY</option>
                            </select>
                        </div>
                        <div class="form-group hidden check_bank" id="check_bank">
                            <!-- <div class="col-md-12"><strong>Ngôn ngữ:</strong></div> -->
                            <div class="col-md-12">
                                <select name="tst_language" id="tst_language" class="form-control">
                                    <option value="vn" selected>Tiếng Việt</option>
                                    <option value="en">English</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group hidden check_bank" id="check_bank">
                            <!-- <div class="col-md-12"><strong>Ngân hàng:</strong></div> -->
                            <div class="col-md-12">
                                <select name="tst_bank" id="tst_bank" class="form-control">
                                    <option value="NCB" selected> Ngân hàng NCB</option>
                                    <option value="AGRIBANK">Ngân hàng Agribank</option>
                                    <option value="SCB">Ngân hàng SCB</option>
                                    <option value="SACOMBANK">Ngân hàng SacomBank</option>
                                    <option value="EXIMBANK"> Ngân hàng EximBank</option>
                                    <option value="MSBANK"> Ngân hàng MSBANK</option>
                                    <option value="NAMABANK"> Ngân hàng NamABank</option>
                                    <option value="VNMART"> Vi dien tu VnMart</option>
                                    <option value="VIETINBANK">Ngân hàng Vietinbank</option>
                                    <option value="VIETCOMBANK"> Ngân hàng VCB</option>
                                    <option value="HDBANK">Ngân hàng HDBank</option>
                                    <option value="DONGABANK">Ngân hàng Dong A</option>
                                    <option value="TPBANK"> Ngân hàng TPBank</option>
                                    <option value="OJB"> Ngân hàng OceanBank</option>
                                    <option value="BIDV"> Ngân hàng BIDV</option>
                                    <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                                    <option value="VPBANK"> Ngân hàng VPBank</option>
                                    <option value="MBBANK"> Ngân hàng MBBank</option>
                                    <option value="ACB"> Ngân hàng ACB</option>
                                    <option value="OCB"> Ngân hàng OCB</option>
                                    <option value="IVB"> Ngân hàng IVB</option>
                                    <option value="VISA"> Thanh toán qua VISA/MASTER</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="note">Ghi chú thêm</label>
                            <textarea name="tst_note" id="note" cols="3" style="min-height: 100px;" rows="2"
                                      class="form-control"></textarea>
                        </div>
                        <div class="btn-buy">
                            <button class="buy1 btn btn-purple {{ \Auth::id() ? '' : 'js-show-login' }}" style="width: 100%;border-radius: 5px" type="submit" name="pay" value="transfer">
                                Thanh toán
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="right content">
            <div class="list">
                <div class="title">DANH SÁCH SẢN PHẨM</div>
                <div class="list__content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="width: 100px;">Hình ảnh</th>
                                <th style="width: 30%">Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <table class="table table-striped" id="showTotal">
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
                                    <p>{{ $item->name }}</p>
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
                                <td style="width: 40px;">
                                    <p>{{$item->qty}}</p>
                                </td>
                                <td>
                                    <span class="js-total-item">{{ number_format($item->price * $item->qty,0,',','.') }} đ</span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @php
                    $total = str_replace(',','.', \Cart::subtotal(0));
                     $shipMoney =  App\Models\Product::SHIPPING_COST;
                    $totalMoneyShip = (int)str_replace(',','',\Cart::subtotal(0)) + (int)$shipMoney;
                @endphp
                <table class="table" id="showTotalCart" style="margin-top: 15px">
                    <tbody>
                    <tr class="showTotalEnd">
                        <th style="text-align: left">Tổng tiền hàng</th>
                        <td style="text-align: right" id="subtotalend">{{ $total }} đ</td>
                    </tr>
                    <tr class="moneyShip">
                        <th style="text-align: left">Phí vận chuyển</th>
                        <td style="text-align: right" id="ship">{{number_format($shipMoney,0,',','.')}} đ</td>
                    </tr>
                    @if ($hasCoupon)
                        @php
                            $subtotal = str_replace(',','',\Cart::subtotal(0));
                            $totalDiscount = floor($subtotal * $codeCoupon['cp_discount'] / 100);
                            $moneyDiscount = number_format(floor($subtotal * $codeCoupon['cp_discount'] / 100));
                            $moneyDiscountConvert = str_replace(',','',$moneyDiscount);
                            $cartUpdateTotal = (int)$moneyDiscountConvert > 0 ? number_format((int)$subtotal - (int)$totalDiscount) : \Cart::subtotal(0);
                            $price = (($codeCoupon['cp_discount']) * $subtotal)  /  100 ;
                            $priceSale = number_format($price,0,',','.');
                            $totalCardEnd = (int)str_replace(',','',$cartUpdateTotal) + (int)$shipMoney;
                        @endphp
                        <tr class="showTotal">
                            <th style="text-align: left" class="th-coupon01"> Giảm tối đa {{ number_format($codeCoupon['cp_discount'])}} {{$discountType }}(<b>Code:</b> {{ $coupon }})
                            </th>
                            <td style="text-align: right" id=" %" class="th-coupon01">-{{$priceSale}} đ</td>
                        </tr>
                    @else
                        @php $totalCardEnd = $totalMoneyShip; @endphp
                    @endif
                    <tr class="showTotalEnd">
                        <th style="text-align: left"><b>Tổng tiền cần thanh toán</b></th>
                        <td style="text-align: right;font-weight: bold"
                            id="subtotal">{{ number_format($totalCardEnd,0,',','.') }} đ
                        </td>
                    </tr>
                    </tbody>
                </table>


                <div class="form-group" style="margin-top: 15px;">
                    @php
                        $style = ($hasCoupon)?"display:inline;":"display: none;";
                    @endphp
                    <label class="control-label" for="inputGroupSuccess3"><i class="fa fa-exchange"
                                                                             aria-hidden="true"></i> Mã giảm giá <span
                                style="{{ $style }} cursor: pointer;" class="text-danger"
                                href="{{ route('checkout.apply_coupon_code') }}" id="removeCoupon">(xóa mã đang dùng <i
                                    class="fa fa fa-times"></i>)</span></label>
                    <div class="input-group ds-flex">
                        <input type="text" placeholder="Nhập mã giảm giá" class="form-control form-coupon"
                               value="{{ $hasCoupon ? session('coupon') : '' }}" id="coupon-value"
                               aria-describedby="inputGroupSuccess3Status">
                        <span class="input-group-addon" id="coupon-button"
                              href="{{ route('checkout.apply_coupon_code') }}" style="cursor: pointer;"
                              data-user-id="{{\Auth::id()}}"
                              data-loading-text="<i class='fa fa-spinner fa-spin'></i> Đang kiểm tra">Kiểm tra</span>
                    </div>
                    <span class="status-coupon" style="display: none;"
                          class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                    <div class="coupon-msg"
                         style="text-align: left;padding-left: 10px;">{{ $hasCoupon ? 'Mã giảm giá có giá trị giảm ' . number_format($codeCoupon['cp_discount']) . $discountType . ' cho đơn hàng này.' : ""  }}</div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('script')
    <script src="{{ asset('js/cart.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js"
            type="text/javascript"></script>
    <script type="text/javascript">

        window.onload = function () {
            //reset select option back page
            $('#tst_type').prop('selectedIndex',0);
        }
        $('#coupon-button').click(function () {
            $('.coupon-msg').text('');
            var coupon = $('#coupon-value').val();
            let user_id = $(this).attr('user-id');
            if (user_id === "undefined") {
                /*$('.coupon-msg').html('Bạn chưa đănh nhập').addClass('text-danger').show();*/
                window.location.href = "http://localhost:8000/account/login";
            } else {
                let Url = $(this).attr('href');
                if (coupon == '') {
                    $('.coupon-msg').html('Bạn chưa nhập mã giảm giá').addClass('text-danger').show();
                } else {
                    $('#coupon-button').button('loading');
                    setTimeout(function () {
                        $.ajax({
                            url: Url,
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                cp_code: coupon,
                                _token: "{{ csrf_token() }}",
                            },
                        })
                            .done(function (result) {
                                $('#coupon-value').val(coupon);
                                $('.coupon-msg').removeClass('text-danger');
                                $('.coupon-msg').removeClass('text-success');
                                $('.coupon-msg').hide();
                                if (result.error == 1) {
                                    $('.coupon-msg').html(result.msg).addClass('text-danger').show();
                                } else {
                                    $("#showTotalCart").find("tr.showTotal, tr.moneyShip, tr.showTotalEnd, tr.shipConst").remove();
                                    $('#removeCoupon').show();
                                    $('.coupon-msg').html(result.msg).addClass('text-success').show();
                                    $('#showTotalCart').prepend(result.html);
                                }
                            })
                            .fail(function () {
                                console.log("error");
                            });
                        $('#coupon-button').button('reset');
                    }, 2000);
                }
            }

        });

        $('#removeCoupon').click(function () {
            let Url = $(this).attr('href');
            $.ajax({
                url: Url,
                type: 'POST',
                dataType: 'json',
                data: {
                    action: "remove",
                    _token: "{{ csrf_token() }}",
                },
            })
                .done(function (result) {
                    $('#removeCoupon').hide();
                    $('#coupon-value').val('');
                    $('.coupon-msg').removeClass('text-danger');
                    $('.coupon-msg').removeClass('text-success');
                    $('.coupon-msg').hide();
                    $('.showTotal').remove();
                    $('.moneyShip').remove();
                    $('.showTotalEnd').remove();
                    $('#showTotalCart').prepend(result.html);
                })
                .fail(function () {
                    console.log("error");
                });
        });
        //chane thanh toán
        $('#tst_type').change(function(){
            var value_bank = $('#tst_type').val();
            if(value_bank == 2){
                $('.check_bank').removeClass('hidden');
                $('.check').addClass('hidden');
            }else{
                $('.check_bank').addClass('hidden');
                $('.check').removeClass('hidden');
            }
        });

        //validate form client
        /*$('.btn-purple').on('click', function(event ){
            event.preventDefault();
            let tst_name = $("input[name*='tst_name']").val();
            let tst_phone = $("input[name*='tst_phone']").val();
            let tst_address = $("input[name*='tst_address']").val();
            let tst_email = $("input[name*='tst_email']").val();
            $('.tst_name').text('');
            $('#name').removeClass('has-error');
            $('.tst_phone').text('');
            $('#phone').removeClass('has-error');
            $('.tst_address').text('');
            $('#address').removeClass('has-error');
            $('.tst_email').text('');
            $('#email').removeClass('has-error');
            if(tst_name == "") {
                $('.tst_name').text('Họ tên không được bỏ trống');
                $('#name').addClass('has-error');
            } else if(tst_phone == "") {
                $('.tst_phone').text('Số điện thoại không được bỏ trống');
                $('#phone').addClass('has-error');
            } else if(IsPhone(tst_phone) == false) {
                $('.tst_phone').text('Số điện thoại không đúng định dạng');
                $('#phone').addClass('has-error');
            } else if(tst_address == "") {
                $('.tst_address').text('Địa chỉ không được bỏ trống');
                $('#address').addClass('has-error');
            } else if(tst_email == "") {
                $('.tst_email').text('Email không được để trống');
                $('#email').addClass('has-error');
            } else if(IsEmail(tst_email) == false) {
                $('.tst_email').text('Email sai định dạng');
                $('#email').addClass('has-error');
            } else if(product_ids.length < 4) {
                $('.select2-selection--multiple').css('border','1px solid red');
            } else {
                $( ".from_cart_register" ).submit();
            }

        });

        function IsEmail(email) {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!regex.test(email)) {
                return false;
            } else {
                return true;
            }
        }

        function IsPhone(phone) {
            var phoneno = /^\d{10}$/;
            if((phone.value.match(phoneno)){
                return true;
            } else {
                return false;
            }
        }*/
    </script>
@stop
