@extends('layouts.app_master_user')
@section('css')
    <style>
        <?php $style = file_get_contents('css/user.min.css');echo $style;?>
        .create-seller {
            margin-bottom: 10px;
        }
    </style>
@stop
@section('content')
    <section>
        <div class="title">Danh sách sản phẩm</div>
        <a class="btn btn-blue create-seller" href="{{  route('seller.product.create') }}">Thêm sản phẩm</a>
        <div class="row mb-5">
            <div class="col-sm-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Name</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Status</th>
                        <th scope="col" style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (isset($products))
                        <tbody>
                        @foreach($products as $key => $product)
                            <tr>
                                <td style="text-align: center;">{{ (($products->currentPage() - 1) * $products->perPage()) + ( $key + 1)  }}</td>
                                <td style="text-align: center">{{ $product->pro_name ?? "[N\A]" }}</td>
                                <td>
                                    <img src="{{ pare_url_file($product->pro_avatar) }}" style="width: 80px;height: 100px;margin-left: 10px">
                                </td>
                                <td style="text-align: center">
                                    <span class="label label-success">{{ $product->category->c_name ?? "[N\A]" }}</span>
                                </td>
                                <td style="text-align: center">
                                    @if ($product->pro_number <= 0)
                                        <span class="text-danger">Còn lại: <b>Hết hàng</b></span>
                                    @else
                                        <span class="text-info">Còn lại:  <b>{{ $product->pro_number }}</b></span>
                                    @endif
                                </td>
                                <td style="text-align: center">
                                    @if ($product->pro_sale)
                                        <span style="text-decoration: line-through;">{{ number_format($product->pro_price,0,',','.') }} vnđ</span><br>
                                        @php
                                            $price = ((100 - $product->pro_sale) * $product->pro_price)  /  100 ;
                                        @endphp
                                        <span>{{ number_format($price,0,',','.') }} vnđ</span>
                                    @else
                                        {{ number_format($product->pro_price,0,',','.') }} vnđ
                                    @endif
                                </td>
                                <td style="text-align: center">
                                    @if ($product->pro_active == 1)
                                        <a href="{{ route('admin.product.active', $product->id) }}" class="label label-info">Active</a>
                                    @else
                                        <a href="{{ route('admin.product.active', $product->id) }}" class="label label-default">Hide</a>
                                    @endif
                                </td>
                                <td style="width: 160px;display: table-row">
                                    <a href="{{ route('seller.product.update', $product->id) }}" style="margin-top: 8px" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                    <a href="{{  route('seller.product.delete', $product->id) }}" style="background-color: red;margin-top: 8px" class="btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@stop
@section('script')

@stop
