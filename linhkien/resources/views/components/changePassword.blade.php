@section('title', 'Thay đổi mật khẩu')
@extends('master')
@section('content')

<div class="home-wrap">
	<div class="content-contact commomBackgroundBoder" style="padding: 16px 250px">	
		<div class="form-group">
			<label for="passold">Mật khẩu cũ</label>
			<input type="text" class="form-control" id="passold" name="passold" placeholder="Nhập mật khẩu cũ">
		</div>
		<div class="form-group">
			<label for="passnew">Mật khẩu mới</label>
			<input type="text" class="form-control" id="passnew" name="passnew" placeholder="Nhập mật khẩu mới">
		</div>
		<div class="form-group">
			<label for="passconfirm">Xác nhận mật khẩu</label>
			<input type="text" class="form-control" id="passconfirm" name="passconfirm" placeholder="Xác nhận mật khẩu">
			<small class="passconfirm form-text" style="color: red"></small>
		</div>
		
		<button type="submit" class="btn btn-primary form-control updatePass">Cập nhật</button>
	</div>
</div> 
@endsection
@section('script')
<script>
	$(document).ready(function(){
		$(".updatePass").click(function (e) {
			var isValue = true;
			var passold = $(this).closest('.content-contact').find('#passold').val()
			var passnew = $(this).closest('.content-contact').find('#passnew').val()
			var passconfirm = $(this).closest('.content-contact').find('#passconfirm').val()
			
			if(passnew !== passconfirm){
				isValue = false
				$('.passconfirm').html("không hợp lệ")
			}
			console.log(passold, ' ', passnew, ' ', passconfirm);
			
			if(isValue === true){
				$.ajaxSetup({  
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				
				$.ajax({
					url: "/profile/change-password",
					method: "POST",
					data: {
						passold: passold,
						passnew: passnew,
						passconfirm: passconfirm,
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
			}
		})
	})
</script>
@stop
