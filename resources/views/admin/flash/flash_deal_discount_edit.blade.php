@if(count($product_ids) > 0)
    <table class="table table-bordered">
        <thead>
        <tr>
            <td class="text-center" width="40%">
                <label for="" class="control-label">Sản phẩm</label>
            </td>
            <td class="text-center">
                <label for="" class="control-label">Giá</label>
            </td>
            <td class="text-center">
                <label for="" class="control-label">Giảm giá</label>
            </td>
            <td>
                <label for="" class="control-label">Loại</label>
            </td>
        </tr>
        </thead>
        <tbody>
        @foreach ($product_ids as $key => $id)
            @php
               $product = \App\Models\Product::findOrFail($id);
                $flash_deal_product = \App\Models\FlashSaleProduct::where('fsp_flash_deal_id', $flash_sale_id)->where('fsp_product_id', $product->id)->first();
            @endphp
            <tr>
                <td>
                    <div class="col-sm-3">
                        <img class="img-md" src="{{ pare_url_file($product->pro_avatar ?? '') ?? '/images/no-image.jpg' }}" alt="Image">
                    </div>
                    <div class="col-sm-9">
                        <label for="" class="control-label">{{ __($product->pro_name) }}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="control-label">{{ number_format($product->pro_price,0,',','.') }} Đ</label>
                </td>   
                @if ($flash_deal_product != null)
                     <td>
                        <input type="number" name="discount_{{ $id }}" value="{{ $flash_deal_product->fsp_discount }}" min="0" step="1" class="form-control">
                    </td>
                @else
                    <td>
                        <input type="number" name="discount_{{ $id }}" value="{{ $product->pro_sale }}" min="0" step="1" class="form-control">
                    </td>
                @endif
                <td style="text-align: center">
                    <select class="demo-select2" name="discount_type_{{ $id }}">
                        <option value="percent">%</option>
                    </select>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
