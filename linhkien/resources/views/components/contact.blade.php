@section('title', 'Liên hệ')
@extends('master')
@section('content')
<div class="home-wrap">
	{{-- {{ $res }} --}}
	<div class="content-contact commomBackgroundBoder">	
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
		</div>
		<div class="form-group">
			<label for="phone">Điện thoại</label>
			<input type="text" class="form-control" id="phone" name="phone" placeholder="Password">
		</div>
		<div class="form-group">
			<label for="content">Nội dung</label>
			<textarea class="form-control" id="content" name="content" rows="3"></textarea>
		</div>
		<button type="submit" class="btn btn-primary sendFeedback">Submit</button>
	</div>
	
</div> 
@endsection
@section('script')
<script>
	$(document).ready(function(){
		$(".sendFeedback").click(function (e) {
		var email = $(this).closest('.content-contact').find('#email').val()
		var phone = $(this).closest('.content-contact').find('#phone').val()
		var content = $(this).closest('.content-contact').find('#content').val()
		$.ajaxSetup({  
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		
		$.ajax({
			url: "/contact",
			method: "POST",
			data: {
				email: email,
				phone: phone,
				content: content
			},
			success: function (data) {
				console.log(data);
				if(data === "success"){
					swal("", "Cảm ơn bạn đã góp ý!", "success");
					
				}else{
					swal("", "Server tạm thời đang bảo trì!", "error");
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