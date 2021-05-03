@extends('admin.masterAdmin')
@section('content')
<div class="content-main">
	<div class="row">
		<div class="col-lg-12">
			 <ol class="breadcrumb">
				  <li class="active">
						<i class="fa fa-dashboard"></i> Dashboard / View And Edit Product
				  </li>
			 </ol>
		</div>
  </div>
  <div class="row">
		<div class="col-lg-12">
			 <div class="panel panel-default">
				  <div class="panel-heading" style="display: flex; justify-content: space-between; ;margin-bottom: 20px">
					  <h3 class="panel-title">
							<i class="fa fa-tags"></i>  View Product
					  </h3>
					  <div style="margin-right: 20px">
						<a class="btn btn-primary" href="/add-product">Add product</a>
					  </div>
				  </div>
				  <div class="panel-body">
						<div class="table-responsive">
							 <table class="table table-striped table-bordered table-hover">
								  <thead>

										<tr>
											 <th> ID_product </th>
											 <th> Name </th>
											 <th> Price </th>
											 <th> Classify </th>
											 <th> Company </th>
											 <th> Picture </th>
											 <th> Edit </th>
											 <th> Delete </th>
											 
										</tr>
								  </thead>
								  <tbody>
									@foreach ($products as $item)
										<tr class="item-info">
											<td class="id-product"> {{$item->ID_product}} </td>
											<td> {{$item->name}} </td>
											<td> {{$item->price}} </td>
											<td> {{$item->classify}} </td>
											<td> {{$item->company}} </td>
											<td class="td-img"> <img src="{{$item->picture}}" alt=""> </td>
											<td> 
												<a href="/edit-product/{{$item->ID_product}}">
													<i class="fa fa-pencil"></i> Edit
												</a> 
											</td>
											<td> 
												<button class="btn btn-danger delete-product">
													<i class="fas fa-trash-alt"></i> Delete
												</button> 
											</td>
										</tr>
										
									@endforeach
								
								  </tbody>
							 </table>
							 <div style="display: flex;justify-content: center;">
								{{$products->links()}} 
							</div>
						</div>
				  </div>
			 </div>
		</div>
  </div>
</div>
@endsection