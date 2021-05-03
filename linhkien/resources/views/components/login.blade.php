@section('title', 'Đăng nhập')
@extends('master')
@section('content')
<div class="home-wrap">
	<div class="login-wrap">
		<div class="login-content">
			<div class="icon-user">
				<img src="{{ asset('asset/img/iconUser.png') }}" alt="IconUser">
			</div>
			
			
			<form action="/login" method="POST" id="login-form">
				@csrf
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="text" class="form-control" name="exampleInputEmail" id="exampleInputEmail" placeholder="Enter email">
					<small id="emailHelp" class="form-text" style="color: red"></small>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" name="exampleInputPassword" id="exampleInputPassword" placeholder="Password">
					<small id="passwordHelp" class="form-text" style="color: red"></small>
				</div> 
				<div class="btn-login text-center mb-4">
					<p class="notifyLogin" style="color: red"></p>
					<button type="submit" class="btn btn-primary" id="submitLogin">Đăng nhập</button>
				</div>
				<div class="btn-login text-center d-flex justify-content-between">
					<div>
						<a href="{{url("/register")}}">Đăng ký tài khoản</a>
					</div>
					<div>
						<a href="{{url("/getpassword")}}">Quên mật khẩu</a>
					</div>
				</div>
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
	$("#login-form").on('submit', function(e){
		var isValue = true;
		e.preventDefault();
		var email = $("#exampleInputEmail").val();
		var pass  = $("#exampleInputPassword").val();
		if(email.length === 0){
			isValue = false;
			$("#emailHelp").html("Vui lòng nhập email");
		}else{
			if(!isEmail(email)){
				isValue = false;
				$("#emailHelp").html("Email không hợp lệ");
			}else{
				$("#emailHelp").html("")
			}
		}

		if(pass.length === 0){
			isValue = false;
			$("#passwordHelp").html("Vui lòng nhập mật khẩu của bạn");
		}else{
			$("#passwordHelp").html("")
		}
		$.ajaxSetup({    // POST http://127.0.0.1:8000/login 419 (unknown status)
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		if(isValue === true){
			$.ajax({
			url:"/login",
			type: "POST",
			data:{
				email: $("#exampleInputEmail").val(),
				password: $("#exampleInputPassword").val()
			},
			success:function(data){
				console.log(data);
				if(data === "sai"){
					$(".notifyLogin").html("Tài khoản sai")
				}else{
					window.location.href = "{{url("/home")}}"

				}
			}
		});
		}
		
	})
</script>	 
@stop