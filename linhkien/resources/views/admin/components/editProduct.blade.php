@extends('admin.masterAdmin')
@section('content')
<div class="content-main">
	<div class="row">
      <div class="col-lg-12">
         <ol class="breadcrumb">
            <li>
               <i class="fa fa-dashboard"></i> Dashboard / Edit Product
            </li>
         </ol>
      </div>
   </div>
   @if(Session::has('danger'))
      <div class="rounded" style="background-color: #d85151">
         {{-- <h4 class="text-white text-center notify-error p-2">{{Session::get('danger')}}</h4> --}}
         <script>
            window.onload = function(){
               alert("cập nhật thành công");
            }
         </script>
      </div>
   @endif
   <div class="row">
      <div class="col-lg-12">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">
                  <i class="fa fa-money fa-fw"></i> Edit Product
               </h3>
            </div>
            <div class="panel-body" style="margin: 0 auto; width: 500px;">
               <form action="/san-pham" class="form-horizontal" method="post" enctype="multipart/form-data" style="width: 100%;">
						@csrf
						<div class="form-group">
                     <label for="" class="control-label col-md-3">
								Name
                     </label>
							<input type="hidden" name="ID_Product" value="{{$product['ID_product']}}">
                        <input name="name" type="text" class="form-control" value="{{$product['name']}}">
                  </div>
						<div class="form-group">
                     <label for="" class="control-label col-md-3">
								Price
                     </label>
                        <input name="price" type="number" class="form-control" value="{{$product['price']}}">
                  </div>
						<div class="form-group">
                     <label for="" class="control-label col-md-3">
								Classify
                     </label>
							<div style="color: grey; font-size: 12px;">Classify old: {{$product['classify']}}</div>
							<select name="classify" id="" class="form-control">
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
                        <input name="company" type="text" class="form-control" value="{{$product['company']}}">
                  </div>
                  <div class="form-group">
                     <label for="" class="control-label col-md-3">
                     	Image
                     </label>
                        <input name="picture" type="text" class="form-control" value="{{$product['picture']}}">
                       
                       <div class="text-center" style="margin-top: 10px">
									<img src="{{$product['picture']}}" class="img-responsive">
							  </div>
                  </div>
                  <div class="form-group">
                     <label for="" class="control-label col-md-3"></label>
                     <input type="submit" name="update" value="Update Now" class="btn btn-primary form-control">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection