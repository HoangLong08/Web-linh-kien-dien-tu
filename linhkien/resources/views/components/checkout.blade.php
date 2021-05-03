@section('title', 'Thanh toán')
@extends('master')
@section('content')
<?php 
$amountMoney = 0 ;
?>
<div class="home-wrap">
	<form action="{{url('/payment')}}" method="POST">
		@csrf
	<div class="row">
		<div class="col-md-8 checkout-left">
			<div class="info-delivery commomBackgroundBoder" style="padding: 20px">
				<h3>Thông tin giao hàng</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="info-receiver">
								<h6 style="margin: 10px 0px">Thông tin người nhận hàng</h6>
								<div class="form-group">
									<label for="name">Họ tên</label>
									<input type="text" class="form-control" id="name" name="name"  placeholder="Nhập họ tên của bạn" required>
									{{-- <small id="name" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
								 </div>
								 <div class="form-group">
									<label for="name">Số điện thoại</label>
									<input type="text" class="form-control" id="phone" name="phone"  placeholder="Nhập điện thoại của bạn" required>
									{{-- <small id="phone" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
								 </div>
								 <div class="form-group">
									<label for="name">Email</label>
									<input type="email" class="form-control" id="email" name="email"  placeholder="Nhập email của bạn" required>
									{{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
								 </div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="info-receiver">
								<h6 style="margin: 10px 0px">Địa chỉ nhận hàng</h6>
								<div class="form-group">
									<label for="name">Tinh/Thành phố</label>
									<input type="text" class="form-control" id="city" name="city"  placeholder="Nhập tỉnh/thành phố của bạn" required>
									{{-- <small id="city" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
								 </div>
								 <div class="form-group">
									<label for="name">Quận/Huyện</label>
									<input type="text" class="form-control" id="quan" name="quan" placeholder="Nhập quận/huyện của bạn" required>
									{{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
								 </div>
								 <div class="form-group">
									<label for="name">Phường/Xã</label>
									<input type="text" class="form-control" id="phuong" name="phuong" placeholder="Nhập phường/xã của bạn" required>
									{{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
								 </div>
								 <div class="form-group">
									<label for="name">Số nhà/thôn</label>
									<input type="text" class="form-control" id="thon" name="thon" placeholder="Nhập số nhà/thôn của bạn" required>
									{{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
								 </div>
								 
							</div>
						</div>
					</div>
			</div>
			<div class="note-order commomBackgroundBoder" style="padding: 20px">
				<h3>Ghi chú cho đơn hàng</h3>
				
				<div class="form-group">
					<input type="text"  style="margin-top: 20px;" class="form-control" id="note"  placeholder="Nhập thông tin ghi chú cho nhà bán hàng">
					
				 </div>
			</div>
			{{-- <div class="payment commomBackgroundBoder">
				<h3>Phương thức thanh toán</h3>
				<p>Thông tin thanh toán của bạn sẽ luôn được bảo mật</p>
				
			</div> --}}
		</div>
		<div class="col-md-4 checkout-right">
			<div class="info-order commomBackgroundBoder checkout-table" >
				<table class="table table-cart ">
					<thead>
						<th></th>
						<th></th>
					</thead>
					<tbody>
						{{-- @if(Cookie::get('shopping_cart')) --}}
						@php 
						$amountMoney = 0;
						@endphp
						@foreach ($products as $item) 
						@php
							$amountMoney += $item->item_quantity * $item->item_price;
						@endphp
						<tr class="table-infomation">
							<td>
								<img src="{{$item->item_image}}" alt="">
							</td>
							<td>
								<p class="checkout-name-product">{{$item->item_name}}</p>
								<p class="checkout-quantity-product">Số lượng: {{$item->item_quantity}}</p>
								<p><span class="checkout-price-product">{{number_format($item->item_price, 0, '', ',')}}</span>đ</p>
								
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="cart-pay commomBackgroundBoder">
				<div class="cart-pay-content">
					<h3>Thanh toán</h3>
					<table class="table">
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
								<td>{{number_format(50000, 0, '', ',')}} đ</td>
							</tr>
							<tr>
								<td>
									Thành tiền
								</td>
								<td>{{number_format($amountMoney + 50000, 0, '', ',')}} đ</td>
							</tr>

						</tbody>
					</table>	
					{{-- <form action=""> --}}
						{{-- <button type="submit" class="btn btn-primary form-control">
							Thanh toán
						</button> --}}
						<button class="btn btn-primary form-control " type="submit">Đặt hàng ngay</button>
					{{-- </form> --}}
				</div>
				
			</div>
		</div>
	</div>
	</form>
</div> 
@endsection
@section('script')

@stop