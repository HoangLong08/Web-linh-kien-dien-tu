@section('title', 'Giỏ hàng')
@extends('master')
@section('content')
<?php 
$amountMoney = 0 ;
?>
<div class="home-wrap">
	<div class="cart-wrap">
		<div class="row">
			{{-- @if(empty($products)) --}}
			<div class="col-md-8">
				<div class="cart-content ">
					<div class="cart-content-header ">
						<h3>Giỏ hàng của bạn (<span class="render-number-cart"></span> sản phẩm)</h3>
						{{-- <div>
							<button class="btn btn-primary clear_cart">xóa tất cả</button>
						</div> --}}
					</div>
					<div class="cart-content-body">
                  	@if(Cookie::get('shopping_cart'))
							<table class="table table-cart" style="border-collapse:separate; border-spacing: 0 1em;">
								<tbody>
									@foreach ($cart_data as $item) 
									@php
										$amountMoney += $item['item_quantity'] * $item['item_price']
									@endphp
									<tr class="commomBackgroundBoder table-infomation">
										<td>
											{{-- {{$item}} --}}
											<img src="{{$item['item_image']}}" alt="">
										</td>
									
										<td>
											<a href="detail/{{$item['item_id']}}" target="_blank">
												<p>{{$item['item_name']}}</p>
											</a>
										</td>
									
										<td>
											<input class="id-hidden" type="hidden" value="{{ $item['item_id'] }}">
											<input class="minus btn btn-primary" type="button" value="-">
											{{-- <input aria-label="quantity" class="input-qty" max="{{$item['item_quantity_product']}}" min="1" name="hidden-count" type="number" value="{{$item['item_quantity']}}"  readonly> --}}
											<input aria-label="quantity" class="input-qty" name="hidden-count" style="width: 50px;" type="text" value="{{$item['item_quantity']}}"  readonly>
											<input class="plus btn btn-primary" type="button" value="+">
										</td>
									
										<td>
											{{number_format($item['item_price'], 0, '', ',')}} đ
										</td>
										<td>
											{{-- <input type="hidden" class="productDd"  /> --}}
											<button class="border rounded-circle p-1 btn-primary clearCartKth" id="{{ $item['item_id'] }}" >X</button>
										</td>
									</tr>
									@endforeach
									
								</tbody>
							</table>
								{{-- @php
									$cookie_data = stripslashes(Cookie::get('shopping_cart'));
        							$cart_data   = json_decode($cookie_data, true);
									$totalcart 	 = count($cart_data);
									if($totalcart ===0 ){
										echo '
										<div class="row">
											<div class="col-md-12 mycard py-5 text-center">
												<div class="mycards">
														<h4>Bạn chưa có đơn hàng nào</h4>
														<a href="../home" class="btn btn-upper btn-primary outer-left-xs mt-5">Mua hàng</a>
												</div>
											</div>
										</div>
										';
									}
								@endphp
								@else
								<div class="row">
									<div class="col-md-12 mycard py-5 text-center">
										<div class="mycards">
												<h4>Bạn chưa có đơn hàng nào</h4>
												<a href="{{ url("../home") }}" class="btn btn-upper btn-primary outer-left-xs mt-5">Mua hàng</a>
										</div>
									</div>
								</div> --}}
								
							@endif
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="cart-pay commomBackgroundBoder" >
					<div class="cart-pay-content">
						<h3>Thanh toán</h3>
						<table class="table" >
							<tbody>
								<tr>
									<td>
										Tạm tính
									</td>
									
									<td>{{number_format($amountMoney, 0, '', ',')}} đ</td>
									
								</tr>
								<tr>
									<td>
										Vận chuyển
									</td>
									<td>{{number_format(0, 0, '', ',')}} đ</td>
								</tr>
								<tr>
									<td>
										Thành tiền
									</td>
									<td>{{number_format($amountMoney, 0, '', ',')}} đ</td>
								</tr>

							</tbody>
						</table>	
						{{-- <form action=""> --}}
							{{-- <button type="submit" class="btn btn-primary form-control">
								Thanh toán
							</button> --}}
							<a class="btn btn-primary form-control" href="{{url('/checkout')}}">Thanh toán</a>
						{{-- </form> --}}
					</div>
					
				</div>
			</div>
			{{-- @else
			<div class="col-md-12 mycard py-5 text-center">
				<div class="mycards">
						<h4>Bạn chưa có đơn hàng nào</h4>
						<a href="{{ url("../home") }}" class="btn btn-upper btn-primary outer-left-xs mt-5">Mua hàng</a>
				</div>
			</div>
			@endif --}}
			
		</div>
	</div>
</div> 
@endsection
@section('script')
<script>
	$('input.input-qty').each(function () {
		var $this = $(this),
			qty = $this.parent().find('.is-form'),
			min = Number($this.attr('min')),
			max = Number($this.attr('max'))
		if (min == 0) {
			var d = 0
		} else d = min
		$(qty).on('click', function () {
			if ($(this).hasClass('minus')) {
				if (d > min) d += -1
			} else if ($(this).hasClass('plus')) {
				var x = Number($this.val()) + 1
				if (x <= max) d += 1
			}
			$this.attr('value', d).val(d)
		})
	})
</script>
@stop