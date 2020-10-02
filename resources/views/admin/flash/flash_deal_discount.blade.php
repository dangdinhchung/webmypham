@if(count($product_ids) > 0)
    <label for="exampleInputEmail1">Discounts</label>
    <table class="table table-bordered">
        <thead>
        <tr>
            <td class="text-center" width="40%">
                <label for="" class="control-label">{{__('Product')}}</label>
            </td>
            <td class="text-center">
                <label for="" class="control-label">{{__('Base Price')}}</label>
            </td>
            <td class="text-center">
                <label for="" class="control-label">{{__('Discount')}}</label>
            </td>
            <td>
                <label for="" class="control-label">{{__('Discount Type')}}</label>
            </td>
        </tr>
        </thead>
        <tbody>
        @foreach ($product_ids as $key => $id)
            @php
                $product = \App\Models\Product::findOrFail($id);
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
                    <label for="" class="control-label">{{ $product->pro_price }}</label>
                </td>
                <td>
                    <input type="number" name="discount_{{ $id }}" value="{{ $product->discount }}" min="0" step="1" class="form-control">
                </td>
                <td style="text-align: center">
                    <select class="demo-select2" name="discount_type_{{ $id }}">
                        <option value="amount" style="width: 10% !important;">$</option>
                        <option value="percent">%</option>
                    </select>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
