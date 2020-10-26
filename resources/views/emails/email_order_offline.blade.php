<?php

use App\Models\Product;

$products = \Cart::content();
$constShip = (int)Product::SHIPPING_COST;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Giỏ hàng</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <style type="text/css">
        .ds-flex {
            display: flex;
        }
        .mr-30 {
            margin-left: 35%;
        }
        .ft-normal {
            font-weight: normal;
        }
    </style>
</head>
<body>
<div marginheight="0" marginwidth="0" style="background:#f0f0f0">
    <div id="wrapper" style="background-color:#f0f0f0;padding-top: 30px;padding-bottom: 30px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="900px"
               style="margin:0 auto;width:600px!important;min-width:600px!important" class="container">
            <tbody>
            <tr>
                <td align="center" valign="middle" style="background:#ffffff">
                    <table style="width:800px;border-bottom:1px solid #ff3333" cellpadding="0" cellspacing="0"
                           border="0">
                        <tbody>
                        <tr>
                            <td align="left" valign="middle" style="width:500px;height:60px">
                                <a href="#" style="border:0" target="_blank" width="130" height="35"
                                   style="display:block;border:0px">
                                    <img src="https://shoop.vn/shoop_vn/uploads/2018/06/logo-shoop-c.png"
                                         style="display: block;border: 0px;float: left;width: 167px;margin-top: 10px;margin-right: 18px;">
                                    <b style="float: left;line-height: 100px;color: red;font-size: 20px;">Beauty
                                        Store</b>
                                </a>
                            </td>
                            <td align="right" valign="middle" style="padding-right:15px">
                                <a href="" style="border:0">
                                    <img src="https://i.imgur.com/eL1uAJx.png" height="36" width="115"
                                         style="display:block;border:0px">
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" valign="middle" style="background:#ffffff">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                        <tr>
                            <td align="left" valign="middle"
                                style="font-family:Arial,Helvetica,sans-serif;font-size:24px;color:#ff3333;text-transform:uppercase;font-weight:bold;padding:25px 10px 15px 10px">
                                Thông báo đặt hàng thành công
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="middle"
                                style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding:0 10px 20px 10px;line-height:17px">
                                Chào bạn <b>{{ $name }}</b>,
                                <br> Cám ơn bạn đã mua sắm tại Beauty Store
                                <br>
                                <br> Đơn hàng của bạn đang
                                <b>chờ shop</b>
                                <b>xác nhận</b> (trong vòng 24h)
                                <br> Chúng tôi sẽ thông tin <b>trạng thái đơn hàng</b> trong email tiếp theo.
                                <br> Bạn vui lòng kiểm tra email thường xuyên nhé.
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" valign="middle" style="background:#ffffff">
                    <table class="table table-condensed" style="width: 700px">
                        <thead>
                        <tr class="cart_menu">
                            <td class="name">STT</td>
                            <td class="name">Mã sản phẩm</td>
                            <td class="name">Tên sản phẩm</td>
                            <td class="price">Giá</td>
                            <td class="quantity">Số lượng</td>
                            <td class="total">Thành tiền</td>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $tong = 0;
                        @endphp
                        @if (!empty($products))
                            @foreach ($products as $key => $row)
                                @php
                                    $tong += ($row->price * $row->qty);
                                @endphp
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td class="cart_id">
                                        <h4><a href="">{{ $row->id }}</a></h4>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="">{{ $row->name }}</a></h4>

                                    </td>
                                    <td class="cart_price">
                                        <h4>{{ number_format($row->price,0,',','.')}} đ</h4>
                                    </td>
                                    <td class="price">
                                        <h4>{{ number_format($row->qty)}}</h4>
                                    </td>
                                    <td class="cart_total">
                                        <h4 class="cart_total_price">{{ number_format($row->price * $row->qty,0,',','.') }}
                                            đ</h4>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                    <table style="width: 500px;margin-right: 70px" class="cke_show_border" cellspacing="1" cellpadding="1" border="0" align="right">
                        <tr>
                            <td style="text-align: right; line-height: 150%;">Tổng tiền:</td>
                            <td style="text-align: right; line-height: 150%;">{{ number_format($tong,0,',','.') }} đ</td>
                        </tr>
                        <tr>
                            <td style="text-align: right; line-height: 150%;">Phí vận chuyển :</td>
                            <td style="text-align: right; line-height: 150%;"><strong>{{ number_format($constShip,0,',','.') }} đ</strong></td>
                        </tr>
                        @if(session('coupon'))
                        <tr>
                            <td style="text-align: right; line-height: 150%;">Mã giảm giá {{$discount}} % (Code: <b>{{$code}}</b>):</td>
                            <td style="text-align: right; line-height: 150%;">-{{$priceSale}} đ</td>
                        </tr>
                        @endif
                        <tr>
                            <td style="text-align: right; line-height: 150%;"><strong>Tổng tiền cần thanh toán:</strong></td>
                            <td style="text-align: right; line-height: 150%;"><strong>{{ number_format($totalMoney,0,',','.') }} đ</strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" valign="middle" style="background:#ffffff;padding-top:20px">
                    <table style="width:500px" cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                        <tr>
                            <td align="center" valign="middle"
                                style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">
                                Đây là thư tự động từ hệ thống. Vui lòng không trả lời email này.
                                <br> Nếu có bất kỳ thắc mắc hay cần giúp đỡ, Bạn vui lòng ghé thăm
                                <b style="font-family:Arial,Helvetica,sans-serif;font-size:13px;text-decoration:none;font-weight:bold">Trung
                                    tâm trợ giúp</b> của chúng tôi tại địa chỉ:
                                <a href="#"
                                   style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#0066cc;text-decoration:none;font-weight:bold"
                                   target="_blank">
                                    help.beauty.vn
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
