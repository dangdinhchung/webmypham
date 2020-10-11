<form role="form" action="" method="POST">
    @csrf
    <div class="col-sm-8">
        <div class="form-group {{ $errors->first('cp_code') ? 'has-error' : '' }}">
            <label for="name">Mã giảm giá <span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" name="cp_code" value="{{ $coupon->cp_code ?? old('cp_code') }}"  placeholder="ABXE, HUQ60 ...">
            <span class="help-block">
                <i class="fa fa-info-circle"></i>&nbsp;Mã coupon là duy nhất. Viết liền, không dấu
            </span>
            @if ($errors->first('cp_code'))
                <span class="text-danger">{{ $errors->first('cp_code') }}</span>
            @endif
        </div>
        {{--<div class="form-group discount-type">
            <label for="name">Loại mã giảm giá</label>
            </br>
            <input class="form-check-input" name="cp_discount_type" type="radio" value="percent" {{ isset($coupon) ? ($coupon->cp_discount_type == 'percent' ? 'checked' : '') : 'checked' }}  id="percent">
            <span class="percent">Percent</span>
            <input class="form-check-input" type="radio" name="cp_discount_type" value="amount" {{ isset($coupon) ? ($coupon->cp_discount_type == 'amount' ? 'checked' : '') : '' }} id="amount">
            <span>Amount</span>
            @if ($errors->first('cp_discount_type'))
                <span class="text-danger">{{ $errors->first('cp_discount_type') }}</span>
            @endif
        </div>--}}
        <div class="form-group {{ $errors->first('cp_discount') ? 'has-error' : '' }}">
            <label for="name">Giảm</label>
            <input type="number" class="form-control" name="cp_discount" value="{{ $coupon->cp_discount ?? old('cp_discount',0) }}">
            @if ($errors->first('cp_discount'))
                <span class="text-danger">{{ $errors->first('cp_discount') }}</span>
            @endif
        </div>
        <div class="form-group {{ $errors->first('cp_number_uses') ? 'has-error' : '' }}">
            <label for="name">Số lần sử dụng</label>
            <input type="number" class="form-control" name="cp_number_uses" value="{{ $coupon->cp_number_uses ?? old('cp_number_uses',1) }}">
            @if ($errors->first('cp_number_uses'))
                <span class="text-danger">{{ $errors->first('cp_number_uses') }}</span>
            @endif
        </div>
        <div class="form-group {{ $errors->first('cp_start_date') ? 'has-error' : '' }}" id="time1">
            <label for="exampleInputEmail1">Ngày bắt đầu</label>
            <input type="date" class="form-control" name="cp_start_date" value="{{  isset($coupon) ? date("Y-m-d",$coupon->cp_start_date) : old('cp_start_date') }}">
            @if ($errors->first('cp_start_date'))
                <span class="text-danger">{{ $errors->first('cp_start_date') }}</span>
            @endif
        </div>
        <div class="form-group {{ $errors->first('cp_end_date') ? 'has-error' : '' }}" id="time2">
            <label for="exampleInputEmail1">Ngày kết thúc</label>
            <input type="date" class="form-control" name="cp_end_date" value="{{  isset($coupon) ? date("Y-m-d",$coupon->cp_end_date) : old('cp_end_date') }}">
            @if ($errors->first('cp_end_date'))
                <span class="text-danger">{{ $errors->first('cp_end_date') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="name">Mô tả <span class="text-danger"></span></label>
            <input type="text" class="form-control" name="cp_description"  placeholder="Mô tả ..." value="{{ $coupon->cp_description ?? old('cp_description') }}">
        </div>
    </div>
    {{-- <div class="col-sm-4 product-choose">
         <div class="form-group ">
             <label class="control-label">Danh mục <b class="col-red">(*)</b></label>
             <select name="pro_category_id" class="form-control" required onchange="get_products_by_subcategory(this)">
                 <option value="">__Click__</option>
                 @foreach($categories as $category)
                     <option value="{{ $category->id }}">
                         {{  $category->c_name }}
                     </option>
                 @endforeach
             </select>
             @if ($errors->first('pro_category_id'))
                 <span class="text-danger">{{ $errors->first('pro_category_id') }}</span>
             @endif
         </div>
         <div class="form-group ">
             <label class="control-label">Sản phẩm <b class="col-red">(*)</b></label>
             <select name="sub_category_ids[]" class="form-control product_id" required >
                 --}}{{--get list product by category here--}}{{--
             </select>
         </div>
         <hr>
         <div class="form-group">
             <button type="submit" class="btn btn-info add-more">Add more</button>
         </div>
     </div>--}}
    <div class="col-sm-12">
        <div class="box-footer text-center"  style="margin-top: 20px;">
            <a href="{{ route('admin.coupon.index') }}" class="btn btn-danger">
                Quay lại <i class="fa fa-undo"></i></a>
            <button type="submit" class="btn btn-success">Lưu dữ liệu <i class="fa fa-save"></i></button>
        </div>
    </div>
</form>