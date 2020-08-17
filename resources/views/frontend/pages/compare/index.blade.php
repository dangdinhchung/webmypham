@extends('layouts.app_master_frontend')
@section('css')
<link rel="stylesheet" href="{{ asset('css/cart.min.css') }}">
<style type="text/css">
    @media (max-width: 767px) {
        .name-product {
            width: 300px;white-space: normal;
        }
    }
    .left-compare {
       width: 100% !important;
        margin-right: 0px !important;
    }
    table {
        text-align: center;
    }

</style>
@stop
@section('content')
    <div class="container cart">
        <div class="left left-compare">
            <div class="list">
                <div class="title">SO SÁNH SẢN PHẨM</div>
                @if(Session::has('compare'))
                    @if(count(Session::get('compare')) > 0)
                         <div class="list__content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="width: 100px;"></th>
                                <th style="width: 30%">Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Mô tả</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td> <a href="http://localhost:8000/san-pham/nuoc-hoa-mini-versace-pour-homme-eau-de-toilette-50" title="Nước hoa mini Versace Pour Homme - Eau De Toilette" class="avatar image contain"> <img alt="" src="/uploads/2020/04/25/2020-04-25__50.jpg" class="lazyload"> </a> </td>
                                <td>
                                    <div style="" class="name-product"> <a href="http://localhost:8000/san-pham/nuoc-hoa-mini-versace-pour-homme-eau-de-toilette-50"><strong>Nước hoa mini Versace Pour Homme - Eau De Toilette</strong></a> </div>
                                </td>
                                <td>
                                    <p><b>11.760 đ</b></p>
                                    <p> <span style="text-decoration: line-through;">12.000 đ</span> <span class="sale">- 2 %</span> </p>
                                </td>
                                <td>
                                    <p> <span style="text-decoration: line-through;">12.000 đ</span> <span class="sale">- 2 %</span> </p>
                                </td>
                                <td> <span class="js-total-item">11.760 đ</span> </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                    @endif
                @else
                    <h4>Không có sản phẩm nào để so sánh !</h4>
                @endif
            </div>
        </div>
    </div>
@stop