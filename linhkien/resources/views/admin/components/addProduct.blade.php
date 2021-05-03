@extends('admin.masterAdmin')
@section('content')
<div class="content-main">
	<div class="row">
      <div class="col-lg-12">
         <ol class="breadcrumb">
            <li>
               <i class="fa fa-dashboard"></i> Dashboard / Add Product
            </li>
         </ol>
      </div>
   </div>
  
   <div class="row">
      <div class="col-lg-12">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">
                  <i class="fa fa-money fa-fw"></i> Add Product
               </h3>
            </div>
            <div class="panel-body" style="margin: 0 auto; width: 500px;">
              <form method="post" id="upload_form" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
                     <label for="" class="control-label col-md-3">
								Name
                     </label>
                     <input name="name" type="text" class="form-control" id="name" >
                  </div>
						<div class="form-group">
                     <label for="" class="control-label col-md-3">
								Price
                     </label>
                     <input name="price" type="number" class="form-control" id="price" >
                  </div>
						<div class="form-group">
                     <label for="" class="control-label col-md-3">
								Classify
                     </label>
							<select name="classify" id="classify" class="form-control">
								<option value="DIENTHOAI">Điện thoại</option>
								<option value="LAPTOP">Laptop</option>
								<option value="DONGHO">Đồng hồ</option>
								<option value="TABLET">Tablet</option>
							</select>
                  </div>
						<div class="form-group">
                     <label for="" class="control-label col-md-3">
								Company
                     </label>
                        <input name="company" type="text" class="form-control" id="company" >
                  </div>
                  <div class="form-group">
                     <label for="" class="control-label col-md-3">
                     	Image
                     </label>
							<input name="picture" type="file" class="form-control" id="picture">
							<a href="https://dau123.000webhostapp.com/lehuuphu/cloudinary/Cloudinary/src/demo.php
							" target="_blank">Thêm ảnh</a>
							<div class="text-center render" style="margin-top: 10px">
								{{-- <img src="" class="img-responsive"> --}}
							</div>
                  </div>
						
                  <div class="form-group">
                     <label for="" class="control-label col-md-3"></label>
                     <button type="submit" class="btn btn-primary form-control" id="add-product"> Cập nhật </button>
                  </div>
					</form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('script')
<script>

	$(document).ready(function(){
		$("#upload_form").on('submit',function (e) {
			e.preventDefault();
			
			$.ajaxSetup({  
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			
			$.ajax({
				url:"{{ route('addProduct.action') }}",
				method: "POST",
				
				data: new FormData(this),
				dataType: 'JSON',
				contentType: false,
				cache: false,
				processData: false,
				success: function (data) {
					console.log(data);
					$('.render').html(data.upload_image)
					// if(data === "success"){
					// 	swal("", "Cảm ơn bạn đã góp ý!", "success");
						
					// }else{
					// 	swal("", "Server tạm thời đang bảo trì!", "error");
					// }
					
				},
				error: function (error) {
					console.log("error",error)
				}
			});
		})
	})
</script>
@stop
