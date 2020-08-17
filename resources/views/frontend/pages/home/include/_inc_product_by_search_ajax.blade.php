<div class="product">
    @if (count($products) > 0)
        <div class="title">Products</div>
        <ul>
            @foreach ($products as $key => $product)
                <li>
                    <a href="{{ route('get.product.detail',$product->pro_slug . '-'.$product->id ) }}">
                        <div class="d-flex search-product align-items-center">
                            <div class="image" style="background-image:url('{{ pare_url_file($product->pro_avatar) }}');">
                            </div>
                            <div class="w-100 overflow--hidden">
                                <div class="product-name text-truncate">
                                    {{ $product->pro_name }}
                                </div>
                                <div class="clearfix">
                                    <div class="price-box float-left">
                                        @php
                                            $price = ((100 - $product->pro_sale) * $product->pro_price)  /  100 ;
                                        @endphp
                                        @if ($product->pro_sale)
                                            <del class="old-product-price strong-400">{{ number_format($product->pro_price,0,',','.') }} đ</del>
                                            <span class="product-price strong-600">{{ number_format($price,0,',','.') }} đ</span>
                                        @else
                                            <span class="product-price strong-600">{{ number_format($product->pro_price,0,',','.') }} đ</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>