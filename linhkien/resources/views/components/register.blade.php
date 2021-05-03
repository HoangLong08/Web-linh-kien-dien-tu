@section('title', 'Đăng ký')
@extends('master')
@section('content')
<div class="home-wrap">
	<div class="login-wrap">
		<div class="login-content">
			@if(Session::has('danger'))
			{{-- {{Session::get('danger')}} --}}
				<div class="rounded" style="background-color: #2e9094">
					<h4 class="text-white text-center notify-error p-2">{{Session::get('danger')}}</h4>
				</div>
			@endif
			<form action="/register" method="POST">
				@csrf
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
					<small id="nameHelp" class="form-text text-muted"></small>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
					<small id="emailHelp" class="form-text text-muted"></small>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
					<small id="passlHelp" class="form-text text-muted"></small>
				</div>
				<div class="form-group">
					<label for="confirmPassword">Comfirm Password</label>
					<input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Enter comfirm password">
					<small id="comfirmPassHelp" class="form-text text-muted"></small>
				</div>
				<div class="form-group">
					<label for="phone">Phone</label>
					<input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone">
					<small id="phoneHelp" class="form-text text-muted"></small>
				</div>
				<div class="btn-login text-center mb-4">
					<button type="submit" class="btn btn-primary" id="submitResgister">Đăng ký</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection