$(document).ready(function(){
	$('.delete-product').click(function(e){
		var idProduct = $(this).closest('.item-info').find('.id-product').text()
		console.log(idProduct);
		$.ajaxSetup({    // POST http://127.0.0.1:8000/login 419 (unknown status)
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		
		$.ajax({
			url: "/detele-product",
			method: "post",
			data: {
				idProduct: idProduct
			},
			success: function (data) {
				console.log(data)
				location.reload();
				alert('delete product successfly')
			},
			error: function (error) {
				alert('không thành công')
				// alert('error: ', error);
			}
		});
	})
})