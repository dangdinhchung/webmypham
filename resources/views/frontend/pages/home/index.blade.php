@extends('layouts.app_master_frontend')
@section('css')
    @php
        $display_menu = config('layouts.component.cate.home.display');
    @endphp
    <style>
        #menu-main {
            display: block !important;
        }

        /* Vendor */
        /* COUNTDOWN TIMER */
        .flash-title {
            display: flex;
            margin-bottom: 15px;
        }
        .top {
            margin-right: 2%;
        }
        .countdown .countdown-item {
            display: inline-block;
        }

        .countdown .countdown-digit,
        .countdown .countdown-label {
            font-size: 2rem;
            font-weight: 300;
            font-family: "Open Sans", sans-serif;
        }

        .countdown .countdown-label {
            font-size: 1.2rem;
            padding: 0 5px;
        }

        .countdown-sm .countdown-digit,
        .countdown-sm .countdown-label {
            font-size: 1.4rem;
        }

        .countdown-sm .countdown-label {
            font-size: 0.875rem;
            padding: 0 5px;
        }

        [data-countdown-label="hide"] .countdown-label:not(.countdown-days) {
            display: none;
        }

        [data-countdown-label="show"] .countdown-separator {
            display: none;
        }

        .countdown--style-1 .countdown-item {
            margin-right: 10px;
        }

        .countdown--style-1 .countdown-item:last-child {
            margin-right: 0;
        }

        .countdown--style-1 .countdown-digit {
            display: block;
            width: 27px;
            height: 27px;
            background: #f3f3f3;
            color: #333;
            font-size: 15px;
            font-weight: 400;
            text-align: center;
            line-height: 27px;
            font-family: "Open Sans", sans-serif;
        }

        .countdown--style-1 .countdown-label {
            display: block;
            margin-top: 5px;
            text-align: center;
            font-size: 13px;
            font-weight: 500;
            font-family: "Open Sans", sans-serif;
            text-transform: uppercase;
        }

        .countdown--style-1-v1 .countdown-digit {
            background: #E62E04;
            color: #fff;
        }
        .text-flash {
            color: red;
            font-weight: bolder;
        }

		<?php $style = file_get_contents('css/home_insights.min.css');echo $style;?>
    </style>
@stop
@section('content')
    <div class="component-slide">
        @if (config('layouts.pages.home.slide.with') == 'full')
            <div id="content-slide">
                <div class="spinner">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
            </div>
        @else
            <div class="container" style="display: flex">
                <div class="left" style="width: 250px">

                </div>
                <div class="right" style=" width: calc(100% - 250px);">
                    <div id="content-slide">
                        <div id="slider">
                            <div class="imageSlide js-banner owl-carousel">
                                @foreach($slides as $item)
                                    <div>
                                        <a href="{{ $item->sd_link }}" title="{{ $item->sd_title }}">
                                            <img alt="Đồ án tốt nghiệp" src="{{ pare_url_file($item->sd_image) }}"  style="max-width: 100%;height: 300px;" class="" />
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="container" id="before-slide">
        {{--show flash sale start--}}
        @if($flashSale != null && strtotime(date('d-m-Y')) >= $flashSale->fs_start_date && strtotime(date('d-m-Y')) <= $flashSale->fs_end_date)
            <div class="content-flash">
                <div class="product-one">
                    <div class="flash-title">
                        <div class="top"> <a href="#" title="" class="main-title main-title-2 text-flash">{{$flashSale->fs_title}}</a> </div>
                        <div class="countdown countdown--style-1 countdown--style-1-v1" data-countdown-date="{{ date('m/d/Y', $flashSale->fs_end_date) }}" data-countdown-label="show">
                        </div>
                    </div>
                    <div class="bot">
                        <div class="left">
                            <div class="image">
                                <a href="https://www.facebook.com/Y2h1bmdjaHVuZ2NodW5nY2h1bmdjaHVuZ2NodW5nY2h1bmdj/" title="" class="Event 1 image" target="_blank">
                                    <img style="height: 310px;" class="lazyload lazy loaded" alt="Event 1" src="{{ asset('images/flash-sale/flash-sale-small.jpg') }}" data-src="/uploads/2020/06/08/2020-06-08__anh1.jpg" data-was-processed="true">
                                </a>
                            </div>
                        </div>
                        <div class="right js-product-one owl-carousel owl-theme owl-custom">
                            @foreach ($flashSale->flash_sale_products as $key => $flash_sale_product)
                                @php
                                    $product = \App\Models\Product::find($flash_sale_product->fsp_product_id);
                                @endphp
                                <div class="item">
                                    @include('frontend.components.product_item',[ 'product' => $product])
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div id="flash_sale"> <a href="https://www.facebook.com/Y2h1bmdjaHVuZ2NodW5nY2h1bmdjaHVuZ2NodW5nY2h1bmdj/" title="" class="image" target="_blank"> <img alt="" style="height:250px;" src="{{ asset('images/flash-sale/flash-sale-big.jpg') }}" class="lazyload" width="100%"> </a> </div>
            </div>
        @endif
        {{--show flash sale end--}}
        <div class="product-one">
            <div class="top">
                <a href="#" title="" class="main-title main-title-2">Sản phẩm bán chạy trong ngày</a>
            </div>
            <div class="bot">
                @if ($event1)
                    <div class="left">
                        <div class="image">
                            <a href="{{  $event1->e_link }}" title="" class="{{ $event1->e_name }} image" target="_blank">
                                <img style="height: 310px;" class="lazyload lazy" alt="{{ $event1->e_name }}" src="{{  asset('images/preloader.gif') }}"  data-src="{{  pare_url_file($event1->e_banner) }}" />
                            </a>
                        </div>
                    </div>
                @endif
                <div class="right js-product-one owl-carousel owl-theme owl-custom">
                    @foreach($topProductBuyNow as $product)
                        <div class="item">
                            @include('frontend.components.product_item',[ 'product' => $product->product])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>



        @if ($event2)
            @include('frontend.pages.home.include._inc_flash_sale')
        @endif
        
        <div class="product-three">
            <div class="top">
                <a href="#" title="" class="main-title main-title-2">Sản phẩm mới</a>
            </div>
            <div class="bot">
                <div class="left">
                    <div class="image">
                        @if (isset($event3->e_link))
                            <a href="{{  $event3->e_link }}" title="" class="{{ $event3->e_name }}" target="_blank">
                                <img style="height: 310px;" class="lazyload lazy" alt="{{ $event3->e_name }}" src="{{  asset('images/preloader.gif') }}"  data-src="{{  pare_url_file($event3->e_banner) }}" />
                            </a>
                        @endif
                    </div>
                </div>
                <div class="right js-product-one owl-carousel owl-theme owl-custom">
                    @if (isset($productsNew))
                        @foreach($productsNew as $product)
                            <div class="item">
                                @include('frontend.components.product_item',['product' => $product])
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        @if (!detectDevice()->isMobile())
            <div class="container">
                <div class="banner" style="display: flex">
                    <div class="item" style="flex: 0 0 33.33333%">
                        <a href="">
                            <img src="{{ asset('images/banner/banner-1.png') }}" alt="">
                        </a>
                    </div>
                    <div class="item" style="flex: 0 0 33.33333%">
                        <a href="">
                            <img src="{{ asset('images/banner/banner-2.png') }}" alt="">
                        </a>
                    </div>
                    <div class="item" style="flex: 0 0 33.33333%">
                        <a href="">
                            <img src="{{ asset('images/banner/banner-1.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        @endif
        <div class="product-two">
            <div class="top">
                <a href="#" class="main-title main-title-2">Sản phẩm nổi bật</a>
            </div>
            <div class="bot">
                @if (isset($productsHot))
                    @foreach($productsHot as $product)
                    {{-- {{ dd($product) }} --}}
                        <div class="item">
                            @include('frontend.components.product_item',['product' => $product])
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="product-two" id="product-recently"></div>
        <div id="product-by-category"></div>
        @include('frontend.pages.home.include._inc_article')
    </div>
@stop

@section('script')
    <script src="{{  asset('js/jquery.countdown.min.js') }}"></script>
    <script>
        //show flash sale time start
        if ($('.countdown').length > 0) {
            $('.countdown').each(function() {
                var $this = $(this);
                var date = $this.data('countdown-date');

                $this.countdown(date).on('update.countdown', function(event) {
                    var $this = $(this).html(event.strftime('' +
                       /* '<div class="countdown-item"><span class="countdown-digit">%-D</span><span class="countdown-label countdown-days">day%!d</span></div>' +
                        '<div class="countdown-item"><span class="countdown-digit">%H</span><span class="countdown-separator">:</span><span class="countdown-label">hr</span></div>' +
                        '<div class="countdown-item"><span class="countdown-digit">%M</span><span class="countdown-separator">:</span><span class="countdown-label">min</span></div>' +
                        '<div class="countdown-item"><span class="countdown-digit">%S</span><span class="countdown-label">sec</span></div>'*/
                        '<div class="countdown-item"><span class="countdown-digit">%-D</span></div>' +
                        '<div class="countdown-item"><span class="countdown-digit">%H</span></div>' +
                        '<div class="countdown-item"><span class="countdown-digit">%M</span></div>' +
                        '<div class="countdown-item"><span class="countdown-digit">%S</span></div>'
                    ));
                });
            });
        }
        //show flash sale time end
		var routeRenderProductRecently  = '{{ route('ajax_get.product_recently') }}';
		var routeRenderProductByCategory  = '{{ route('ajax_get.product_by_category') }}';
		var CSS = "{{ asset('css/home.min.css') }}";
    </script>
    <script type="text/javascript">
        //sản phẩm vừa xem - getLoadProductRecently
		<?php $js = file_get_contents('js/home.js');echo $js;?>
    </script>
@stop
