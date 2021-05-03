@section('title', 'Trang cá nhân')
@extends('master')
@section('content')
<div class="home-wrap">
	<div class="content-contact commomBackgroundBoder" style="padding: 16px 250px">	
		<div class="form-group">
			<label for="account">Tên khách hàng</label>
			<input type="text" class="form-control" id="account" name="account" placeholder="Nhập tên khách hàng" value="{{$user['account']}}">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" value="{{$user['gmail']}}">
		</div>
		<div class="form-group">
			<label for="phone">Điện thoại</label>
			<input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập điện thoại" value="{{$user['phone_number']}}">
		</div>
		<div class="form-group">
			<label for="name">Tinh/Thành phố</label>
			<input type="text" class="form-control" id="city" name="city"  placeholder="Nhập tỉnh/thành phố của bạn" value="{{$user['province']}}">
			{{-- <small id="city" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
		 </div>
		 <div class="form-group">
			<label for="name">Quận/Huyện</label>
			<input type="text" class="form-control" id="quan" name="quan" placeholder="Nhập quận/huyện của bạn" value="{{$user['district']}}">
			{{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
		 </div>
		 <div class="form-group">
			<label for="name">Phường/Xã</label>
			<input type="text" class="form-control" id="phuong" name="phuong" placeholder="Nhập phường/xã của bạn" value="{{$user['commune']}}">
			{{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
		 </div>
		 <div class="form-group">
			<label for="name">Số nhà/thôn</label>
			<input type="text" class="form-control" id="thon" name="thon" placeholder="Nhập số nhà/thôn của bạn" value="{{$user['address']}}">
			{{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
		 </div>
		<button type="submit" class="btn btn-primary form-control sendFeedback">Cập nhật</button>
	</div>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function(){
		$(".sendFeedback").click(function (e) {
		var account = $(this).closest('.content-contact').find('#account').val()
		var email = $(this).closest('.content-contact').find('#email').val()

		var phone = $(this).closest('.content-contact').find('#phone').val()
		var city = $(this).closest('.content-contact').find('#city').val()
		var quan = $(this).closest('.content-contact').find('#quan').val()
		var phuong = $(this).closest('.content-contact').find('#phuong').val()
		var thon = $(this).closest('.content-contact').find('#thon').val()
		console.log(account, ' ', email, ' ', phone, ' ', city, ' ', quan, ' ', phuong, ' ', thon);
		
		$.ajaxSetup({  
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		
		$.ajax({
			url: "/profile",
			method: "POST",
			data: {
				account: account,
				email: email,
				phone: phone,
				city: city,
				quan :quan,
				phuong:phuong,
				thon :thon
			},
			success: function (data) {
				console.log(data);
				if(data === "success"){
					swal("", "Cập nhật thành công!", "success");
					
				}else{
					swal("", "Cập nhật thất bại!", "error");
				}
				
			},
			error: function (error) {
				console.log("error",error)
			}
		});
	})
	})
</script>
@stop