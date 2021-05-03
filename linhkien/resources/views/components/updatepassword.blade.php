@section('title', 'Thay đổi mật khẩu')
@extends('master')
@section('content')
<div class="home-wrap">
	<div class="login-wrap">
		<div class="login-content">
			<form action="{{url('/getpassword/updatepassword')}}" method="POST" id="update-password-form">
				{{csrf_field()}}
				<div class="form-group">
					<label for="">Mật khẩu mới</label>
					<input type="text" name="password" class="form-control" id="exampleInputEmailForget" placeholder="Nhập mật khẩu của bạn">
					<small id="emailPass" class="form-text" style="color: red"></small>
				</div>
				<button type="submit" class="btn btn-primary form-control">Xác nhận</button>
			</form>
		</div>
	</div>
</div>
@endsection