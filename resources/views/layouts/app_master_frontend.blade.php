<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <title>{{ strtolower($title_page ?? "Đồ án tốt nghiệp")   }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" sizes="32x32" type="image/png" href="{{ asset('ico.png') }}" />
        <link rel="stylesheet" href="{{ asset('css/search-ajax.css') }}">
        @yield('css')
        <style>
            .typed-search-box {
                position: absolute;
                top: 10%;
                border: 1px solid #eceff1;
                box-shadow: 0 5px 25px 0 rgba(123,123,123,0.15);
                background: #fff;
                width: calc(40% - 48px);
                height: auto;
                transition: all 0.3s;
                -webkit-transition: all 0.3s;
                -ms-webkit-transition: all 0.3s;
                min-height: 200px;
                z-index: 999999;
            }
            .typed-search-box .title {
                background: #ddd;
                font-size: 12px;
                text-align: right;
                opacity: 0.5;
                padding: 3px 15px 4px;
                text-transform: uppercase;
                line-height: 1;
                color: #5b3535;
            }
            .typed-search-box ul {
                margin: 0;
                padding: 0;
                list-style: none;
            }
            .typed-search-box .product a {
                padding: 8px 15px;
            }
            .typed-search-box ul a {
                display: block;
                padding: 5px 15px;
                color: #525252;
            }
            .typed-search-box .search-product .image {
                width: 50px;
                min-width: 50px;
                background-color: #ffffff;
                background-size: cover;
                height: 50px;
                background-position: center;
            }
            .overflow--hidden {
                overflow: hidden !important;
            }
            .typed-search-box .search-product .product-name {
                margin-bottom: 5px;
                font-size: 13px;
                font-weight: 600;
                margin-left: 20px;
            }
            .typed-search-box .search-product .price-box {
                margin-left: 20px;
            }
            .price-box .old-product-price {
                font-size: 15px;
                color: #888;
                font-weight: 500;
                text-decoration: line-through;
                margin-right: 5px;
            }
            .search-product {
                align-items: center!important;
                display: flex!important;
            }
        </style>

        {{-- Thông báo --}}
        @if(session('toastr'))
            <script>
                var TYPE_MESSAGE = "{{session('toastr.type')}}";
                var MESSAGE = "{{session('toastr.message')}}";
            </script>
        @endif
    </head>
    <body>
        @include('frontend.components.header')
        @yield('content')
        @if (get_data_user('web'))
            @include('components.popup._inc_popup_wallet')
        @endif
        @include('frontend.components.footer')
        <script>
            var DEVICE = '{{  device_agent() }}'
        </script>
        <script src="{{  asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script>
            {{--start search ajax--}}
            $('#search').on('keyup', function(){
                search();
            });

            $('#search').on('focus', function(){
                search();
            });
            function search(){
                var search = $('#search').val();
                if(search.length > 0){
                    $('body').addClass("typed-search-box-shown");

                    $('.typed-search-box').removeClass('d-none');
                    $('.search-preloader').removeClass('d-none');
                    $.post('{{ route('search.ajax') }}', { _token: '{{ @csrf_token() }}', search:search}, function(data){
                        if(data == '0'){
                            $('.typed-search-box').addClass('d-none');
                            $('#search-content').html(null);
                            $('.typed-search-box .search-nothing').removeClass('d-none').html('Sorry, nothing found for <strong>"'+search+'"</strong>');
                            $('.search-preloader').addClass('d-none');
                        }
                        else{
                            $('.typed-search-box .search-nothing').addClass('d-none').html(null);
                            $('#search-content').html(data);
                            $('.search-preloader').addClass('d-none');
                        }
                    });
                }
                else {
                    $('.typed-search-box').addClass('d-none');
                    $('body').removeClass("typed-search-box-shown");
                }
            }
            {{--end search ajax--}}
        </script>

        @yield('script')
    </body>
</html>
