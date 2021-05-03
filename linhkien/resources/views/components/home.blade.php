
@section('title', 'Shop bán hàng linh kiện')
@extends('master')

@section('content')

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
	  <div class="carousel-item active" style="height: 350px;">
		 <img class="d-block" width="100%" height="auto" src="{{ asset('asset/img/banner_first.jpg') }}" alt="First slide">
	  </div>
	  <div class="carousel-item" style="height: 350px;">
		 <img class="d-block" width="100%" height="auto" src="{{ asset('asset/img/banner_second.png') }}" alt="Second slide">
	  </div>
	  <div class="carousel-item" style="height: 350px;">
		 <img class="d-block" width="100%" height="auto" src="{{ asset('asset/img/banner_third.webp') }}" alt="Third slide">
	  </div>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
	  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	  <span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
	  <span class="carousel-control-next-icon" aria-hidden="true"></span>
	  <span class="sr-only">Next</span>
	</a>
 </div>

 <div class="home-wrap">
	<div class="row">
		{{-- <div class="col-md-2">
			<div class="boxfixed commomBackgroundBoder">
				<div class="label-title">
					Sắp xếp
				</div>
				<div class="att-scroll">
					<ul>
						<li>
							<input type="radio" id="sort_ordering_desc" name="sort_by" class="sort_by" value="ordering-desc" checked="checked">
							<label for="sort_ordering_desc">Bán chạy nhất</label>
						</li>
						<li>
							<li>
								<input type="radio" id="sort_id_desc" name="sort_by" class="sort_by" value="id-desc">
								<label for="sort_id_desc">Sản phẩm mới</label>
							</li>
						</li>
						<li>
							<li>
								<input type="radio" id="sort_price_asc" name="sort_by" class="sort_by" value="priceAsc">
								<label for="sort_price_asc">Giá tăng dần</label>
							</li>
						</li>
						<li>
							<li>
								<input type="radio" id="sort_price_desc" name="sort_by" class="sort_by" value="priceDesc">
								<label for="sort_price_desc">Giá giảm dần</label>
							</li>
						</li>
					</ul>
				</div>
				<div class="label-title">
					Phân loại
				</div>
				<div class="att-scroll">
					<ul>
						<li>
							<input type="radio" id="product_lap_top" name="sort_by" class="sort_by" value="ordering-desc" checked="checked">
							<label for="product_lap_top">Lap Top</label>
						</li>
						<li>
							<input type="radio" id="product_dien_thoai" name="sort_by" class="sort_by" value="ordering-desc" checked="checked">
							<label for="product_dien_thoai">Điên thoại</label>
						</li>
						<li>
							<input type="radio" id="product_ram" name="sort_by" class="sort_by" value="ordering-desc" checked="checked">
							<label for="product_ram">Ram</label>
						</li>
						<li>
							<input type="radio" id="product_cpu" name="sort_by" class="sort_by" value="ordering-desc" checked="checked">
							<label for="product_cpu">Cpu</label>
						</li>
					</ul>
				</div>
			</div>
		</div> --}}
		<div class="col-md-12" id="renderFillter">
			<div class="product" >
				<div class="row">
					@foreach ($products as $item)
					<div class="col-md-3 col-sm-6">
						<a href="detail/{{$item->ID_product}}">
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
			<div style="display: flex;justify-content: center;">
				{{$products->links()}} 
			</div>
		</div>
	</div>
</div>

@endsection
