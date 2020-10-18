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
                                style="font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#ff3333;text-transform:uppercase;font-weight:bold;padding:25px 10px 15px 10px">
                                <p>Bạn có một yêu cầu xác thực tài khoản <a href="{{ $link }}" >click vào đây</a> để kích hoạt tài khoản.</p>
                            </td>
                        </tr>
                        </tbody>
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
