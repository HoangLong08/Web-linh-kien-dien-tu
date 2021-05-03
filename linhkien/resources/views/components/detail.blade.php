@section('title', 'Chi tiết sản phẩm')
@extends('master')
@section('content')

<?php
	// use Illuminate\Support\Facades\Hash;
	// $password = '12345';
	// $hashedPassword = Hash::make($password);
	// echo $hashedPassword;
?>
<div class="home-wrap">
	<div class="row">
		<div class="col-md-9">
			<div class="content-product commomBackgroundBoder">
				<div class="row">
					<div class="col-md-5">
						<div class="detail-product-img">
							<img id="image" src={{$product['picture']}} alt="">
						</div>
						<div class="muti-img">
							<div class="small-img">
								<img class="thumbnail" src="{{$productDetail['picture1']}}" alt="sản phẩm">
							</div>
							<div class="small-img">
								<img class="thumbnail" src="{{$productDetail['picture2']}}" alt="sản phẩm">
							</div>
							<div class="small-img">
								<img class="thumbnail" src="{{$productDetail['picture3']}}" alt="sản phẩm">
							</div>
						</div>		
					</div>
					<div class="col-md-7">
						<div class="detail-product-info">
							<div class="name-product">{{$product['name']}}</div>
							<input type="hidden" hidden value="{{$product['ID_product']}}" class="id_product">
							<p>Thương hiệu {{$product['company']}}</p>
							<p>Chỉ còn <span>{{$productDetail['amount']}}</span> sản phẩm</p>
							<div class="price-product">
								<span>{{number_format($product['price'], 0, '', ',')}}</span> đ
							</div>	
							<div class="row">
								{{-- <div class="col-md-6">
									<button class="btn btn-primary form-control" id="buyNow">Mua</button>
								</div> --}}
								<div class="col-md-12">
									<button class="btn btn-primary form-control" id="addToCart">Thêm giỏ hàng</button>
								</div>
							</div>
							<h5 style="margin-top: 12px">Thông số kỹ thuật</h5>
							<div class="detail-info" >
								<p>Màn hình: {{$productDetail['screen']}}</p>
								<p>Camera trước: {{$productDetail['front_camera']}}</p>
								<p>Camera sau: {{$productDetail['rear_camera']}}</p>
								<p>CPU: {{$productDetail['CPU']}}</p>
								<p>Ram: {{$productDetail['ram']}}</p>
								<p>Rom: {{$productDetail['rom']}}</p>
							</div>
							
						</div>
					</div>
				
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="widget commomBackgroundBoder">
				<div>
					<span><i class="far fa-truck-moving"></i></span>
				<p>Sản phẩm được miễn phí giao hàng</p>
				</div>
				<h6 style="font-weight: bold; margin-bottom: 12px">Chính sách bán hàng</h6>
				<div>
					<span><i class="far fa-check-circle"></i></span>
					<p>Cam kết hàng chính hãng 100%</p>
				</div>
				<div>
					<span><i class="far fa-truck-loading"></i></span>
					<p>Miễn phí giao hàng từ 800K</p>
				</div>
				<div>
					<span><i class="far fa-sync-alt"></i></span>
					<p>Đổi trả miễn phí trong 10 ngày</p>
				</div>
				<h6 style="font-weight: bold; margin-bottom: 12px">Dịch vụ khác</h6>
				<div>
					<span><i class="far fa-cog"></i></span>
					<p>Sửa chữa đồng giá 150.000đ.</p>
				</div>
				<div>
					<span><i class="fas fa-broom"></i></span>
					<p>Vệ sinh máy tính, laptop.</p>
				</div>
				<div>
					<span><i class="far fa-shield"></i></span>
					<p>Bảo hành tại nhà.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="detail-relate-product commomBackgroundBoder">
		<div class="detail-relate-header">
			<h4>Sản phẩm tương tự</h4>
			<div>
				<a href="">Xem tất cả</a>
			</div>
		</div>
		<div class="carousel" data-flickity='{ "groupCells": true }'>
			@foreach ($productSame as $item)
			<div class="carousel-cell">
				
				<a href="../detail/{{$item->ID_product}}">
					<div class="card" >
						<div class="zoom">
							<img class="card-img-top" src="{{$item->picture}}" alt="Card image">	
						</div>
						<div class="card-body">
							<h3 class="card-title text-center" style="font-size: 16px; height: 50px;">{{$item->name}} <br> {{number_format($item->price, 0, '', ',')}} đ </h3>
						</div>
					</div>
				</a>
				
			</div>
			@endforeach
		</div>
	</div>
	<div>

	</div>
</div>
@endsection
@section('script')
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script>
	function changeImage(e) {
      var path = e.target.src;
      document.getElementById("image").src = path;
   }

   var thumbnailElements = document.getElementsByClassName('thumbnail');
   for (var i = 0; i < thumbnailElements.length; i++) {
      thumbnailElements[i].onclick = changeImage;
   }
</script>
@stop
