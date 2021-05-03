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