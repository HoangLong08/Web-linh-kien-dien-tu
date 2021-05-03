@section('title', 'Shop bán hàng linh kiện')
@extends('master')

@section('content')

 <div class="home-wrap">
	<div class="row">
		<div class="col-md-2">
			<div class="boxfixed commomBackgroundBoder">
				<div class="label-title">
					Sắp xếp
				</div>
				<div class="att-scroll">
					<ul>
						<li>
							<input type="radio" id="sort_price_asc" name="sort_by" class="sort_by" value="priceAsc">
							<label for="sort_price_asc">Giá tăng dần</label>
						</li>
						<li>
							<input type="radio" id="sort_price_desc" name="sort_by" class="sort_by" value="priceDesc">
							<label for="sort_price_desc">Giá giảm dần</label>
						</li>
					</ul>
				</div>
				<div class="label-title">
					Phân loại
				</div>
				<div class="att-scroll">
					<ul>
						<li>
							<input type="radio" id="laptop" name="sort_by" class="sort_by" value="laptop" >
							<label for="laptop">Lap Top</label>
						</li>
						<li>
							<input type="radio" id="dienthoai" name="sort_by" class="sort_by" value="dienthoai" >
							<label for="dienthoai">Điên thoại</label>
							{{-- <form action="{{url('/search')}}" type="GET" class="form-search">
								<input type="text" class="form-control" name="keyword" value="Laptop" disabled readonly>
								<div class="input-group-append">
								  <button type="submit" class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></button>
								</div>
							</form> --}}
						</li>
						<li>
							<input type="radio" id="dongho" name="sort_by" class="sort_by" value="dongho" >
							<label for="dongho">Đồng hồ</label>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-10" id="renderFillter">
			<div class="product" >
				<div class="row">
					@foreach ($products as $item)
					<div class="col-md-3 col-sm-6">
						<a href="detail/{{$item->ID_product}}">
							<div class="card" >
								<div class="zoom">
									<img class="card-img-top" src="{{$item->picture}}" alt="Card image">
									<div class="card-body">
										<h3 class="card-title text-center" style="font-size: 16px; height: 50px;">{{$item->name}} <br> {{number_format($item->price, 0, '', ',')}} đ </h3>
									</div>
								</div>
							</div>
						</a>
					</div>
					@endforeach
				</div>
			</div>
			{{-- <div style="display: flex;justify-content: center;">
				{{$products->links()}} 
			</div> --}}
		</div>
	</div>
</div>

@endsection
@section('script')
<script>
	$(document).ready(function(){
		const queryString = window.location.search;
		console.log(queryString);
		const urlParams = new URLSearchParams(queryString);
		const productSearch = urlParams.get('keyword')
		console.log(productSearch)
		$("#sort_price_asc").click(function(){

			var tmp = $("#sort_price_asc").val();
			
			$.ajax({
				url:"/sort",
				method:"GET",
				data:{tmp: tmp, productSearch: productSearch},
				success:function(data){
					console.log(data);
					 $('#renderFillter').html(data);
				}
			});
		})
		$("#sort_price_desc").click(function(){
			var tmp = $("#sort_price_desc").val();
			console.log(tmp)
			$.ajax({
				url:"/sort",
				method:"GET",
				data:{tmp: tmp, productSearch: productSearch},
				success:function(data){
					console.log(data);
					$('#renderFillter').html(data);
				}
			});
		})
		$("#laptop").click(function(){
			var tmp = $("#laptop").val();
			console.log(tmp)
			$.ajax({
				url:"/sort",
				method:"GET",
				data:{tmp: tmp, productSearch: productSearch},
				success:function(data){
					console.log(data);
					$('#renderFillter').html(data);
				}
			});
		})
		$("#dienthoai").click(function(){
			var tmp = $("#dienthoai").val();
			console.log(tmp)
			$.ajax({
				url:"/sort",
				method:"GET",
				data:{tmp: tmp, productSearch: productSearch},
				success:function(data){
					console.log(data);
					$('#renderFillter').html(data);
				}
			});
		})
		$("#dongho").click(function(){
			var tmp = $("#dongho").val();
			console.log(tmp)
			$.ajax({
				url:"/sort",
				method:"GET",
				data:{tmp: tmp, productSearch: productSearch},
				success:function(data){
					console.log(data);
					$('#renderFillter').html(data);
				}
			});
		})
	})
</script>
@stop