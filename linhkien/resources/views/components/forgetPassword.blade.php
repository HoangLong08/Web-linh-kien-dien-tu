@section('title', 'Quên mật khẩu')
@extends('master')
@section('content')
<div class="home-wrap">
	<div class="login-wrap">
		<div class="login-content">
			@if(Session::has('danger'))
			{{-- {{Session::get('danger')}} --}}
				<div class="rounded" style="background-color: #d85151">
					<h4 class="text-white text-center notify-error p-2">{{Session::get('danger')}}</h4>
				</div>
			@endif
			<form action="{{url('/getpassword')}}" method="POST" id="forget-password-form">
				{{csrf_field()}}
				<div class="form-group">
					<label for="">Vui lòng nhập email để lấy lại mật khẩu</label>
					<input type="text" name="email" class="form-control" id="exampleInputEmailForget" placeholder="Nhập email của bạn">
					<small id="emailHelp" class="form-text" style="color: red"></small>
				</div>
				<button type="submit" class="btn btn-primary form-control">Xác nhận</button>
			</form>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
	function isEmail(email) {
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return regex.test(email);
	}
	// exampleInputEmail   exampleInputPassword
	// $("#forget-password-form").on('submit', function(e){
	// 	var isValue = true;
	// 	e.preventDefault();
	// 	var email = $("#exampleInputEmailForget").val();
	// 	if(email.length === 0){
	// 		isValue = false;
	// 		$("#emailHelp").html("Vui lòng nhập email");
	// 	}else{
	// 		if(!isEmail(email)){
	// 			isValue = false;
	// 			$("#emailHelp").html("Email không hợp lệ");
	// 		}else{
	// 			$("#emailHelp").html("")
	// 		}
	// 	}
	// 	// console.log(email)
	// 	$.ajaxSetup({    // POST http://127.0.0.1:8000/login 419 (unknown status)
	// 		headers: {
	// 			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	// 		}
	// 	});
	// 	if(isValue === true){
	// 		$.ajax({
	// 			url:"/getpassword",
	// 			type: "POST",
	// 			data:{
	// 				email: $("#exampleInputEmail").val(),
	// 			},
	// 			success:function(data){
	// 				console.log(data);
	// 				if(data === "EmailNotFound"){
	// 					$(".notify-error").html("Email chưa được đăng ký")
	// 				}else{
	// 					if(data === "EmailFound"){
	// 						$(".notify-error").html("");
						
	// 					// window.location.href = "{{url("/home")}}"

	// 					}

	// 				}
	// 			}
	// 		});
	// 	}
		
	// })
</script>
@stop