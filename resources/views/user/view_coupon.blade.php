@extends('layouts.app_master_frontend')
@section('css')
    <style>
        <?php $style = file_get_contents('css/user_view_product.css');echo $style;?>
        .coupon {
            border: 5px dotted #bbb;
            width: 100%;
            border-radius: 15px;
            margin: 0 auto;
            max-width: 600px;
        }

        .tooltip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 87px;
            background-color: black;
            color: #fff;
            font-size: 11px;
            text-align: center;
            border-radius: 6px;
            padding: 2px 0;
            position: absolute;
            z-index: 1;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
        }

        .promo {
            background: #ccc;
            padding: 3px;
        }

        .expire {
            color: red;
        }
    </style>
@stop
@section('content')
    <div class="product-two">
        <div class="container">
            <div class="product-list">
                <div class="right">
                    <div class="group" id="user-product-view">
                        <div class="top">
                            <a href="#" style="text-transform: none;" class="main-title">Danh sách mã giảm giá</a>
                            <a href="{{route('get.home')}}" class="btn btn-primary">Quay lại</a>
                        </div>
                        <div class="bot">
                            @if (isset($listCoupon))
                                @foreach($listCoupon as $item => $coupon)
                                    <div class="item">
                                <div class="product-item coupon">
                                    <a href="http://localhost:8000/san-pham/kem-chong-nang-some-by-mi-spf50pa-86"
                                       title="" class="avatar image contain">
                                        <img alt="coupon"
                                             src="{{  asset('images/coupon.jpg') }}"
                                             class="lazyload lazy loaded" data-was-processed="true">
                                    </a>
                                    {{--<a href="#"
                                       title="{{$coupon->cp_code}}" class="coupon-code">
                                        <h3 style="text-align: center;font-size: 17px;font-weight: 600;">{{$coupon->cp_code}}</h3>
                                    </a>--}}
                                    <button class="btn btn-purple btn-copy tooltip" style="margin-bottom: 12px;" id="code-coupon-{{$item}}" data-count="{{$item}}" type="button" data-clipboard-text="{{$coupon->cp_code}}">
                                        {{$coupon->cp_code}}
                                        <span class="tooltiptext">Click copy code</span>
                                    </button>
                                    <p class="rating">
                                        {{$coupon->cp_description}}
                                    </p>
                                    <p>
                                        <span class="percent">Giảm : -{{$coupon->cp_discount}} %</span>
                                        <br>
                                        @if (isset($checkCouponUsed))
                                            @foreach($checkCouponUsed as $key => $row)
                                                @if($row->cpu_coupon_id == $coupon->id)
                                                    <span>Đã sử dụng</span>
                                                    <br>
                                                @else
                                                    <span>Chưa sử dụng</span>
                                                    <br>
                                                @endif
                                            @endforeach
                                        @else
                                            <span>Chưa sử dụng</span>
                                            <br>
                                        @endif
                                        <span class="percent">HSD : </span>
                                        @if($coupon->cp_end_date >= $convertDateNow)
                                            <span>{{ date("Y-m-d", $coupon->cp_end_date) ?? "[N\A]" }}</span>
                                        @else
                                            <span>{{ date("Y-m-d", $coupon->cp_end_date) ?? "[N\A]" }} (Hết hạn)</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                                 @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
    <script type="text/javascript">
        <?php $js = file_get_contents('js/product_search.js');echo $js;?>
         var c = new ClipboardJS('.btn-copy');
        // c.on('success', function () {
        //     $('.btn-copy').text('Copied!');
        // })
    </script>
@stop
