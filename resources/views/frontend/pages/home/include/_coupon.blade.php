<div class="top">
    <a href="#" style="text-transform: none;" class="main-title">Danh sách mã giảm giá</a>
    <a href="{{route('get.home')}}" class="btn btn-primary">Quay lại</a>
</div>
<div class="bot">
    @if (isset($listCoupon))
        @foreach($listCoupon as $item)
            <div class="item">
                @include('frontend.components.list_coupon',['listCoupon' => $listCoupon])
            </div>
        @endforeach
    @endif
</div>
