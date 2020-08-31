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
    .list__content {
        margin-top: 10px;
    }

</style>
@stop
@section('content')
    <div class="container cart">
        <div class="left left-compare">
            <div class="list">
                <div class="title">SO SÁNH SẢN PHẨM</div>
                <a href="{{ route('reset.compare') }}" class="label label-success">Reset Compare List </a>
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
                            @foreach (Session::get('compare') as $key => $item)
                            <tr>
                                <td>
                                    <a href="{{ route('get.product.detail', \App\Models\Product::find($item)->pro_slug . '-'. \App\Models\Product::find($item)->id ) }}" class="avatar image contain">
                                        <img alt="" src="{{ pare_url_file( \App\Models\Product::find($item)->pro_avatar ) }}" class="lazyload" title="{{ \App\Models\Product::find($item)->pro_name }}">
                                    </a>
                                </td>
                                <td>
                                    <div style="" class="name-product"> <a href="{{ route('get.product.detail', \App\Models\Product::find($item)->pro_slug . '-'. \App\Models\Product::find($item)->id ) }}"><strong>{{ \App\Models\Product::find($item)->pro_name }}</strong></a> </div>
                                </td>
                                @php
                                  $price = ((100 - \App\Models\Product::find($item)->pro_sale) * \App\Models\Product::find($item)->pro_price)  /  100 ;
                                @endphp
                                <td>
                                    @if (\App\Models\Product::find($item)->pro_sale)
                                        <p><b>{{ number_format(\App\Models\Product::find($item)->pro_price,0,',','.') }} đ</b></p>
                                        <p> <span style="text-decoration: line-through;">{{ number_format($price,0,',','.') }} đ</span> <span class="sale"> -{{ \App\Models\Product::find($item)->pro_sale }}%</span> </p>
                                    @else
                                        <p><b>{{ number_format(\App\Models\Product::find($item)->pro_price,0,',','.') }} đ</b></p>
                                    @endif
                                </td>
                                <td>
                                    <p>{{ \App\Models\Product::find($item)->pro_number }}</p>
                                </td>
                                <td>
                                    <span class="js-total-item">{{ \App\Models\Product::find($item)->pro_description }}</span>
                                </td>
                            </tr>
                            @endforeach
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