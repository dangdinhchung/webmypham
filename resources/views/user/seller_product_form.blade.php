<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="pro_added_by" value="seller">
    <div class="form-group ">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" name="pro_name" placeholder="Iphone 5s ...." autocomplete="off" value="{{  $product->pro_name ?? old('pro_name') }}">
        @if ($errors->first('pro_name'))
            <span class="text-danger">{{ $errors->first('pro_name') }}</span>
        @endif
    </div>
    <div class="row">
        <div class="col-sm-3 col-seller">
            <div class="form-group"> <label for="exampleInputEmail1">Giá sản phẩm</label>
                <input type="text" name="pro_price" value="{{  $product->pro_price ?? old('pro_price',0) }}" class="form-control" data-type="currency" placeholder="15.000.000"> </div>
                @if ($errors->first('pro_price'))
                    <span class="text-danger">{{ $errors->first('pro_price') }}</span>
                @endif
        </div>
        <div class="col-sm-2 col-seller">
            <div class="form-group"> <label for="exampleInputEmail1">Giảm giá</label>
                <input type="number" name="pro_sale" value="{{  $product->pro_sale ?? old('pro_sale',0) }}" class="form-control" data-type="currency" placeholder="5"> </div>
        </div>
        <div class="col-sm-2 col-seller">
            <div class="form-group"> <label for="exampleInputEmail1">Số lượng</label>
                <input type="number" name="pro_number_import" value="{{  $product->pro_number_import ?? old('pro_number_import',0) }}" class="form-control" placeholder="5"> </div>
        </div>
        <div class="col-sm-4 col-seller">
            <div class="form-group" id="time"> <label for="exampleInputEmail1">Ngày sử dụng ( tính từ ngày nhập )</label>
                <input type="text" class="form-control hasDatepicker" name="pro_expiration_date" value="" id="dp1598976124641"> </div>
        </div>
    </div>
    <div class="form-group ">
        <label class="control-label">Danh mục <b class="col-red">(*)</b></label>
        <select name="pro_category_id" class="form-control ">
            <option value="">__Click__</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ ($product->pro_category_id ?? '') == $category->id ? "selected='selected'" : "" }}>
                    {{  $category->c_name }}
                </option>
            @endforeach
        </select>
        @if ($errors->first('pro_category_id'))
            <span class="text-danger">{{ $errors->first('pro_category_id') }}</span>
        @endif
    </div>

    <div class="row">
        @foreach($attributes  as $key => $attribute)
            <div class="form-group col-sm-3">
                <h4 style="border-bottom: 1px solid #dedede;padding-bottom: 10px;">{{ $key }}</h4>
                @foreach($attribute as $item)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="attribute[]" {{ in_array($item['id'], $attributeOld ) ? "checked"  : '' }}
                            value="{{ $item['id'] }}"> {{ $item['atb_name'] }}
                        </label>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    <div class="form-group block-images">
        <label for="exampleInputEmail1">Ảnh đại diện</label>
        <div style="margin-bottom: 10px">
            <img src="{{ pare_url_file($product->pro_avatar ?? '') ?? '/images/no-image.jpg' }}" onerror="this.onerror=null;this.src='/images/no-image.jpg';" alt="" class="img-thumbnail" style="width: 200px;height: 200px;">
        </div>
        <div style="position:relative;">
            <a class="btn btn-primary" href="javascript:;"> Choose File... <input type="file" style="position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:&quot;progid:DXImageTransform.Microsoft.Alpha(Opacity=0)&quot;;opacity:0;background-color:transparent;color:transparent;" name="pro_avatar" size="40" class="js-upload"> </a> &nbsp;
            <span class="label label-info" id="upload-file-info"></span>
        </div>
    </div>
    <div class="form-group ">
        <label for="exampleInputEmail1">Description</label>
        <textarea name="pro_description" class="form-control" cols="5" rows="2" autocomplete="off">{{  $product->pro_description ?? old('pro_description') }}</textarea>
        @if ($errors->first('pro_description'))
            <span class="text-danger">{{ $errors->first('pro_description') }}</span>
        @endif
    </div>
    <div class="form-group ">
        <label for="exampleInputEmail1">Nội dung</label>
        <textarea name="pro_content" id="content" class="form-control textarea" cols="5" rows="2" > {{ $product->pro_content ?? '' }}</textarea>
        @if ($errors->first('pro_content'))
            <span class="text-danger">{{ $errors->first('pro_content') }}</span>
        @endif
    </div>
    <button type="submit" class="btn btn-blue btn-md">Submit</button>
    <a class="btn btn-light btn-md" href="{{ route('seller.product.index') }}">Quay lại</a>
</form>