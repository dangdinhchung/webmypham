@extends('layouts.app_master_frontend')
@section('css')
    @php
        $display_menu = config('layouts.component.cate.home.display');
    @endphp
    <style>
        #menu-main {
            display: block !important;
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
        {{--show flash sale--}}

        <div class="product-one">
            <div class="top"> <a href="#" title="" class="main-title main-title-2">Flash sale</a> </div>
            <div class="bot">
                <div class="left">
                    <div class="image">
                        <a href="https://www.facebook.com/TrungPhuNA" title="" class="Event 1 image" target="_blank">
                            <img style="height: 310px;" class="lazyload lazy loaded" alt="Event 1" src="/uploads/2020/06/08/2020-06-08__anh1.jpg" data-src="/uploads/2020/06/08/2020-06-08__anh1.jpg" data-was-processed="true">
                        </a>
                    </div>
                </div>
                <div class="right js-product-one owl-carousel owl-theme owl-custom">
                    @foreach($productsPay as $product)
                        <div class="item">
                            @include('frontend.components.product_item',[ 'product' => $product])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div id="flash_sale"> <a href="https://www.facebook.com/TrungPhuNA" title="" class="image" target="_blank"> <img alt="" style="height:250px;" src="https://dienmaythienhoa.vn/uploads/images/4.%20Infomation/1.%20Flash%20Sale/900-1.jpg" class="lazyload" width="100%"> </a> </div>


        <div class="product-one">
            <div class="top">
                <a href="#" title="" class="main-title main-title-2">Sản phẩm bán chạy</a>
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
                    @foreach($productsPay as $product)
                        <div class="item">
                            @include('frontend.components.product_item',[ 'product' => $product])
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
    <script>
		var routeRenderProductRecently  = '{{ route('ajax_get.product_recently') }}';
		var routeRenderProductByCategory  = '{{ route('ajax_get.product_by_category') }}';
		var CSS = "{{ asset('css/home.min.css') }}";
    </script>
    <script type="text/javascript">
		<?php $js = file_get_contents('js/home.js');echo $js;?>
    </script>
@stop
