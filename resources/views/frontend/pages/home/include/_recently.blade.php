<div class="top">
    <a href="#" style="text-transform: none;" class="main-title">Sản Phẩm Vừa Xem</a>
    {{-- @if(Request::url() === 'san-pham-ban-da-xem')
        <a href="{{route('get.home')}}" class="btn btn-primary">Quay lại</a>
    @endif --}}
</div>
<div class="bot">
    @if (isset($products))
        @foreach($products as $product)
            <div class="item">
                @include('frontend.components.product_item',['product' => $product])
            </div>
        @endforeach
    @endif
</div>
