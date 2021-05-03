@section('title', 'Quản lý đơn hàng')
@extends('master')
@section('content')

<div class="home-wrap">
	<div class="content-contact " style="padding: 16px 200px">	
		<table class="table commomBackgroundBoder" >
			<tbody>
				<?php
					$res = array();
					foreach ($order as $item){
						array_push($res, (int)$item->Id_order);
					}
					foreach (array_unique($res) as $item){
						$Madonhang = $item;
						$Ngaydathang = $Tenkhachhang = $Email = $Trangthai = "";
						$Tongdon = 0;

						foreach ($order as $item_){
							if($item_->Id_order === $item){
								$Ngaydathang = $item_->Date_order;
								$Tenkhachhang = $item_->name;
								$Email = $item_->email;
								$Trangthai =$item_->status ;
								$Tongdon += $item_->total_money;
							}
						}
						?>
						<tr  style="background: rgb(91, 137, 163);">
							<td colspan="2">Mã đơn hàng: {{$Madonhang}}</td>
							<td colspan="2">Ngày đặt hàng: {{$Ngaydathang}}</td>
						</tr>
						<tr>
							<td colspan="2">Tên khách hàng: {{$Tenkhachhang}}</td>
							<td colspan="2">Email: {{$Email}}</td>
		
						</tr>
						<tr>
							<td colspan="4">
								<table class="table">
									<thead>
										<th>STT</th>
										<th>Tên sản phẩm</th>
										<th>Số lượng</th>
										<th>Thành tiền</th>
									</thead>
									<tbody>
										<?php 
											$i = 0;
											foreach ($order as $item_){
												$i++;
												if($item_->Id_order === $item){
										?>
										<tr>
											
											<td>{{$i}}</td>
											<td>{{$item_->name}}</td>
											<td>{{$item_->quantity}}</td>
											<td>{{number_format($item_->total_money, 0, '', ',')}} đ</td>
										</tr>
										<?php
	
												}else{
													$i = 0;
												}
											}
										?>
									</tbody>
								</table>
							</td>
						</tr>
						
						<tr style="background: rgb(218, 232, 240)" >
							<td colspan="2">Trạng thái: {{$Trangthai}}</td>
							<td colspan="2">Tổng đơn: {{number_format($Tongdon, 0, '', ',')}} đ</td>
		
						</tr>
						<?php
					}
				?>
				
				
				
			</tbody>
		</table>
		
		
	</div>
</div> 
@endsection
