<section class="top-header desktop" style="background: {{ config('layouts.component.header-top.background') }} ">
    <div class="container">
        <div class="content">
            <div class="left">
                <a href="{{ route('get.static.customer_care') }}" title="Chăm sóc khách hàng" rel="nofollow">Chăm sóc khách hàng</a>
                 <a href="{{ route('get.user.transaction') }}" title="Kiểm tra đơn hàng" rel="nofollow">Kiểm tra đơn hàng</a>
            </div>
            <div class="right">
                @if (Auth::check())
                    <a href="">Xin chào {{ Auth::user()->name }}</a>
                    <a href="{{  route('get.user.dashboard') }}">Quản lý tài khoản</a>
                    <a href="{{  route('get.logout') }}">Đăng xuất </a>
                @else
                    <a href="{{  route('get.register') }}">Đăng ký</a>
                    <a href="{{  route('get.login') }}">Đăng nhập</a>
                @endif
             </div>
        </div>
    </div>
</section>
<section class="top-header mobile" style="background: {{ config('layouts.component.header-top.background') }} ;">
    <div class="container">
        <div class="content">
            <div class="left">
                <a href="{{ route('get.static.customer_care') }}" title="Chăm sóc khách hàng" rel="nofollow">Chăm sóc khách hàng</a>
                <a href="{{ route('get.user.transaction') }}" title="Kiểm tra đơn hàng" rel="nofollow">Kiểm tra đơn hàng</a>
                @if (Auth::check())
                    <a href="">Xin chào {{ Auth::user()->name }}</a>
                    <a href="{{  route('get.user.dashboard') }}">Quản lý tài khoản</a>
                    <a href="{{  route('get.logout') }}">Đăng xuất </a>
                @else
                    <a href="{{  route('get.register') }}">Đăng ký</a>
                    <a href="{{  route('get.login') }}">Đăng nhập</a>
                @endif
            </div>
        </div>
    </div>
</section>

<div class="commonTop" style="position: unset !important;">
    <div id="headers" style="background: {{ config('layouts.component.menu.background') }} ">
        <div class="container header-wrapper">
            <!--Thay đổi-->
            <div class="logo">
                <a href="{{  route('get.home') }}" class="desktop">
                   <h4 style="color: white;font-family: cursive;font-size: 20px;">Beauty Store</h4>
                </a>
                <span class="menu js-menu-cate"><i class="fa fa-list-ul"></i> </span>
            </div>
            <div class="search">

                <form action="{{ $link_search ?? route('get.product.list',['k' => Request::get('k')]) }}" role="search" method="GET">
                    {{--<input type="text" name="k" value="{{ Request::get('k') }}" class="form-control" placeholder="Tìm kiếm sản phẩm ...">--}}
                    <input type="text" aria-label="Search" id="search" name="k" value="{{ Request::get('k') }}" class="w-100 form-control" placeholder="I'm shopping for..." autocomplete="off">
                    <button type="submit" class="btnSearch">
                        <i class="fa fa-search"></i>
                        <span>Tìm kiếm</span>
                    </button>

                    <div class="typed-search-box d-none">
                        <div class="search-preloader">
                            <div class="loader"><div></div><div></div><div></div></div>
                        </div>
                        <div class="search-nothing d-none">
                        </div>
                        <div id="search-content">
                        </div>
                    </div>
                </form>
            </div>
            <ul class="right">
                <li id="compare">
                    <a href="{{ route('get.compare.list') }}" title="compare">
                        <i class="fa fa-refresh" aria-hidden="true"></i>
                        @if(Session::has('compare'))
                            <span class=""> ({{ count(Session::get('compare'))}}) </span>
                        @else
                            <span class=""> (0) </span>
                        @endif
                    </a>
                </li>
                <li>
                    <a href="{{ route('get.shopping.list') }}" title="Giỏ hàng">
                        <i class="fa fa-shopping-bag"></i>
                        <span class="cart-count">  ({{ \Cart::count() }})</span>
                    </a>
                </li>
                <li class="desktop">
                    <a href="tel:18006005" title="" class="info-user js-show-dropdown">
                        <img src="{{ asset('images/no-image.jpg') }}" alt="">
                        <span class="fa fa-angle-down"></span>
                    </a>
                    <ul class="header-menu-user">
                        @foreach(config('user') as $item)
                            <li>
                                <a href="{{ route($item['route']) }}" class="{{ \Request::route()->getName() == $item['route'] ? 'active' : '' }}">
                                    <i class="{{ $item['icon'] }}"></i>
                                    <span>{{ $item['name'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>

            <div id="menu-main" class="container" style="display: none">
                <ul class="menu-list">
                    @foreach($categories as $item)
                    <li>
                        <a href="{{  route('get.category.list', ['process' => 'parent','slug' => $item->c_slug.'-'.$item->id]) }}"
                        {{--<a href="{{  route('get.category.list', $item->c_slug.'-'.$item->id) }}"--}}
                           title="{{  $item->c_name }}" class="js-open-menu">
                            <img src="{{ pare_url_file($item->c_avatar) }}" alt="{{ $item->c_name }}">
                            <span>{{  $item->c_name }}</span>
                            @if (isset($item->children) && count($item->children))
                                <span class="fa fa-angle-right"></span>
                            @else
                                <span></span>
                            @endif
                        </a>
                        @if (isset($item->children) && count($item->children))
                        <div class="submenu">
                            <div class="group">
                                <div class="item">
                                    @foreach($item->children as $children)
                                        <a href="{{  route('get.category.list', ['process' => 'children','slug' => $children->c_slug.'-'.$children->id]) }}"
                                        {{--<a href="{{  route('get.category.list', $children->c_slug.'-'.$children->id) }}"--}}
                                           title="{{  $children->c_name }}" class="js-open-menu">
                                            <span>{{  $children->c_name }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</div>
