@extends('layouts.app_master_frontend')
@section('css')
    <style>
        <?php $style = file_get_contents('css/product_detail_insights.min.css');echo $style;?>
        .number-empty, .number-empty:hover {
            cursor: not-allowed;
        }

        .compare {
            margin-left: 10px;
        }

        /*hover coupon*/
        .tooltip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 187px;
            height: 30px;
            background-color: white;
            color: #929292;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            margin-top: 26px;
            margin-left: -56px;
            z-index: 1;
            border: 1px solid;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
        }
        .la-star {
            font-size: 15px;
            color: rgba(240,202,108,.31);
        }
        .rating i.active{
            color: #f49a31 !important;
        }
    </style>
@stop
@section('content')
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li>
                    <a itemprop="url" href="/" title="Home"><span itemprop="title">Trang chủ</span></a>
                </li>
                <li>
                    <a itemprop="url" href="{{ route('get.product.list') }}" title="Sản phẩm"><span
                                itemprop="title">Sản phẩm</span></a>
                </li>

                <li>
                    <a itemprop="url" href="" title="Đồng hồ Diamond D"><span
                                itemprop="title">{{ $product->pro_name }}</span></a>
                </li>

            </ul>
        </div>
        <div class="card">
            <div class="card-body info-detail">
                <div class="left">
                    {{--                    @include('frontend.pages.product_detail.include._inc_album')--}}
                    <a href="{{ route('get.product.detail',$product->pro_slug . '-'.$product->id ) }}" title=""
                       class="">
                        <img alt="" style="max-width: 100%;width: 100%;height: auto"
                             src="{{ pare_url_file($product->pro_avatar) }}"
                             class="lazyload">
                    </a>
                </div>
                <div class="right" id="product-detail" data-id="{{ $product->id }}">
                    <h1>{{  $product->pro_name }}</h1>
                    @if ( $product->pro_number <= 0 )
                        <p class="text-danger"
                           style="font-size: 14px;margin-bottom: 5px;background: #dedede;padding: 5px;">Sản phẩm đã hết
                            hàng</p>
                    @endif
                    <div class="right__content">
                        <div class="info">

                            <div class="prices">
                                {{--  @if ($product->pro_sale)
                                     <p>Giá niêm yết:
                                         <span class="value">{{ number_format($product->pro_price,0,',','.') }} đ</span>
                                     </p>
                                     @php
                                         $price = ((100 - $product->pro_sale) * $product->pro_price)  /  100 ;
                                     @endphp
                                     <p>
                                         Giá bán: <span
                                             class="value price-new">{{  number_format($price,0,',','.') }} đ</span>
                                         <span class="sale">-{{  $product->pro_sale }}%</span>
                                     </p>
                                 @else
                                     <p>
                                         Giá bán: <span class="value price-new">{{  number_format($product->pro_price,0,',','.') }} đ</span>
                                     </p>
                                 @endif --}}
                                <p>Giá niêm yết:
                                    <span class="value">{{ number_format($product->pro_price,0,',','.') }} đ</span>
                                </p>
                                <p>
                                    Giá bán: <span
                                            class="value price-new">{{  home_discounted_base_price($product->id) }} đ</span>
                                    <span class="sale">-{{  home_discounted_base_sale($product->id) }}%</span>
                                </p>
                                <p class="rating">
                                    <span>
                                        @php
                                            $iactive = 0;
                                            if ($product->pro_review_total){
                                                $iactive = round($product->pro_review_star / $product->pro_review_total,2);
                                            }

                                        @endphp
                                        @for($i = 1 ; $i <= 5 ; $i ++)
                                            <i class="la la-star {{ $i <= $iactive ? 'active' : ''  }}"></i>
                                        @endfor
                                    </span>
                                     <span class="text" style="margin-left: 6px;">{{ $product->pro_review_total }} đánh giá</span>
                                </p>
                                {{--@if(isset($couponList))
                                    <div class="coupon-list">
                                        <p>
                                            Mã giảm giá của shop:
                                        <div>
                                            @foreach($couponList as $key => $coupon)
                                                <div class="label label-default tooltip"> {{$coupon->cp_code}}
                                                    <span class="tooltiptext">Giảm {{$coupon->cp_discount}}% cho đơn hàng 100.000 vnđ</span>
                                                </div>
                                            @endforeach
                                        </div>
                                        </p>
                                    </div>
                                @endif--}}
                               {{-- <p>
                                    <span>View :&nbsp</span>
                                    <span>{{ $product->pro_view }}</span>
                                    <i class="fa fa-refresh compare" aria-hidden="true"
                                       onclick="addToCompare({{ $product->id }})"></i>
                                </p>--}}
                            </div>
                            <div class="btn-cart">
                                <a href="{{ route('get.shopping.add', $product->id) }}" title="Thêm vào giỏ hàng"
                                   class="muangay {{ $product->pro_number <= 0 ? 'number-empty' : '' }} {{ !\Auth::id() ? 'js-show-login' : 'js-add-cart' }}">
                                    <span>Mua ngay</span>
                                    <span>Hotline: 1800.6005</span>
                                </a>
                                <a href="{{ route('ajax_get.user.add_favourite', $product->id) }}"
                                   title="Thêm sản phẩm yêu thích"
                                   class="muatragop  {{ !\Auth::id() ? 'js-show-login' : 'js-add-favourite' }}">
                                    <span>Yêu thích</span>
                                    <span>Sản phẩm</span>
                                </a>
                            </div>
                            <div class="infomation">
                                <h2 class="infomation__title">Thông tin</h2>
                                <div class="infomation__group">

                                    <div class="item">
                                        <p class="text1">Danh mục:</p>
                                        <h3 class="text2">
                                            @if (isset($product->category->c_name))
                                                {{--<a href="{{  route('get.category.list', $product->category->c_slug).'-'.$product->pro_category_id }}">{{ $product->category->c_name }}</a>--}}
                                                {{ $product->category->c_name }}
                                            @else
                                                "[N\A]"
                                            @endif
                                        </h3>
                                    </div>
                                    @foreach($attribute as $key => $attr)
                                        <div class="item">
                                            @foreach($attr as  $k => $at)
                                                @if (in_array($k, $attributeOld))
                                                    <p class="text1">{{ $key }}:</p>
                                                    <h3 class="text2">{{ $at['atb_name'] }}</h3>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            {{--                            @include('frontend.pages.product_detail.include._inc_keyword')--}}
                        </div>
                        @if (isset($event1))
                            <div class="ads">
                                <a href="#" title="Giam giá" target="_blank"><img alt="Hoan tien" style="width: 100%"
                                                                                  src="{{ pare_url_file($event1->e_banner) }}"></a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="tab-content" style="margin-bottom: 10px;">
                <ul class="nav" style="margin-bottom: 15px;padding-top: 10px;">
                    <li><a href="" class="tab-item active" data-id="#tab-content">Nội dung</a></li>
                    <li><a href="" class="tab-item" data-id="#tab-rating">Đánh giá</a></li>
                </ul>
                <div class="tab-item-content active" id="tab-content">
                    <div class="" style="margin-bottom: 10px">
                        {!! $product->pro_content !!}
                    </div>
                </div>
                <div class="tab-item-content" id="tab-rating">
                    @include('frontend.pages.product_detail.include._inc_ratings')
                </div>
            </div>


            <div class="comments">
                <div class="form-comment">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="productId" value="{{ $product->id }}">
                        <div class="form-group">
                            <textarea placeholder="Mời bạn để lại bình luận ..." name="comment" class="form-control"
                                      id="" cols="30" rows="5"></textarea>
                        </div>
                        <div class="footer">
                            <p>
                                <a href="" title="Gửi ảnh" class="js-update-image"><i class="la la-camera"></i> Gửi ảnh</a>
                                <input type="file" class="js-input-image" id="document" name="images[]" multiple
                                       style="opacity: 0;display: none">
                                <a href="">Quy định đăng bình luận</a>
                            </p>
                            <button class=" {{ \Auth::id() ? 'js-save-comment' : 'js-show-login' }} {{$user == 2 ? 'js-active' : 'js-not-active'}}">Gửi bình luận
                            </button>
                        </div>
                        <div class="gallery"></div>
                    </form>
                </div>
                @include('frontend.pages.product_detail.include._inc_list_comments')
            </div>

        </div>
        <div class="card-body product-des">
            <div class="left">
                <div class="tabs">
                    <div class="tabs__content">
                        <div class="product-five">
                            <div class="bot js-product-5 owl-carousel owl-theme owl-custom">
                                @foreach($productsSuggests as $product)
                                    <div class="item">
                                        @include('frontend.components.product_item',['product' => $product])
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right">
                @if (isset($event3))
                    <a href="#" title="Giam giá" target="_blank"><img alt="Hoan tien" style="width: 100%"
                                                                      src="{{ pare_url_file($event3->e_banner) }}"></a>
                @endif
            </div>
        </div>
    </div>
    {{-- @if ($isPopupCaptcha >= 2)
        @include('frontend.pages.product_detail.include._inc_popup_captcha')
    @endif --}}
@stop
@section('script')
    <script>
        var ROUTE_COMMENT = '{{ route('ajax_post.comment') }}';
        var CSS = "{{ asset('css/product_detail.min.css') }}";
        var URL_CAPTCHA = '{{ route('ajax_post.captcha.resume') }}'
    </script>
    <script src="{{ asset('js/product_detail.js') }}" type="text/javascript"></script>

    <script>
        function addToCompare(id) {
            $.post('{{ route('compare.addToCompare') }}', {_token: '{{ csrf_token() }}', id: id}, function (data) {
                $('#compare').html(data);
                // showFrontendAlert('success', 'Item has been added to compare list');
                // $('#compare_items_sidenav').html(parseInt($('#compare_items_sidenav').html())+1);
            });
        }

        //copy coupon
        // copy content to clipboard
        // function copyToClipboard(element) {
        //     var $temp = $("<input>");
        //     $("body").append($temp);
        //     $temp.val($(element).text()).select();
        //     document.execCommand("copy");
        //     $temp.remove();
        // }
        //
        // // copy coupone code to clipboard
        // $(".tooltip").on("click", function() {
        //     copyToClipboard(".tooltip");
        // });
    </script>

@stop
