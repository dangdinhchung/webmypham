<form role="form" action="" method="POST">
	@csrf
	<div class="col-sm-8">
		<div class="form-group {{ $errors->first('sl_name') ? 'has-error' : '' }}">
			<label for="name">Nhà cung cấp <span class="text-danger">(*)</span></label>
			<select name="ie_suppliere" class="form-control">
				@foreach($suppliere as $item)
					<option value="{{ $item->id }}" {{ ($invoiceEntered->ie_suppliere ?? 0) ==  $item->id ? "selected='selected'" : "" }}>{{ $item->sl_name }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="form-group {{ $errors->first('sl_name') ? 'has-error' : '' }}">
			<label for="name">Sản phẩm <span class="text-danger">(*)</span></label>
			<select name="ie_product_id"  class="form-control js-products">
				@foreach($products as $item)
					<option value="{{ $item->id }}" {{ ($invoiceEntered->ie_product_id ?? 0) ==  $item->id ? "selected='selected'" : "" }}>Name :  {{ $item->pro_name }}
						- Giá : {{ number_format($item->pro_price,0,',','.') }}
						- Số lượng : {{ $item->pro_number_import }}
						- Tổn tiền : {{ number_format($item->pro_price * $item->pro_number_import,0,',','.') }}
					</option>
				@endforeach
			</select>
		</div>
	</div>

	<div class="col-sm-8">
		<div class="form-group {{ $errors->first('ie_number') ? 'has-error' : '' }}">
			<label for="name">Số lượng nhập <span class="text-danger">(*)</span></label>
			<input type="number" class="form-control" id="qty" required value="{{ old('ie_number',$invoiceEntered->ie_number ?? 0) }}"  name="ie_number"  placeholder="10 ...">
		</div>
	</div>
	<div class="col-sm-8">
		<div class="form-group {{ $errors->first('ie_number') ? 'has-error' : '' }}">
			<label for="name">Gía nhập <span class="text-danger">(*)</span></label>
			<input type="number" required class="form-control js-money-input" value="{{ old('ie_money',$invoiceEntered->ie_money ?? 0) }}"  name="ie_money"  placeholder="10000 ...">
		</div>
	</div>
	<div class="col-sm-8">
		<div class="form-group {{ $errors->first('ie_number') ? 'has-error' : '' }}">
			<label for="name">Thành tiền <span class="text-danger">(*)</span></label>
			<input type="text" disabled class="form-control" id="total_money" value="{{ number_format($invoiceEntered->ie_total_money ?? 0,0,',','.') }} VNĐ"  name="ie_money"  placeholder="20.000.000">
		</div>
	</div>
	<div class="col-sm-8">
		<div class="form-group {{ $errors->first('ie_total_money') ? 'has-error' : '' }}">
			<label for="name">Số tiền đã thanh toán <span class="text-danger">(*)</span></label>
			<input type="number" class="form-control" value="{{ $invoiceEntered->ie_the_advance ?? 0 }}"  name="ie_the_advance"  placeholder="20000 ...">
		</div>
	</div>
	@php
		$historyPay = array_reverse(json_decode($invoiceEntered->ie_meta ?? '', true) ?? []);
	@endphp
	@if (!empty($historyPay))
		<div class="col-sm-8">
			<div class="form-group">
				<label for="name">Lịch sử đã thanh toán <span class="text-danger">(*)</span></label>
				<ul>
					@foreach($historyPay as  $item)
						<li>Số tiền: <b>{{ number_format($item['price'],0,',','.') }} VNĐ</b> - Thời gian: <b>{{ create_time_carbon($item['time']) }}</b></li>
					@endforeach
				</ul>

			</div>
		</div>
	@endif
	<div class="col-sm-8">
		<div class="box-footer text-center">
			<a href="{{ route('admin.invoice_entered.index') }}" class="btn btn-danger">
				Quay lại <i class="fa fa-undo"></i></a>
			<button type="submit" class="btn btn-success">Lưu dữ liệu <i class="fa fa-save"></i></button>
		</div>
	</div>
</form>