document.onkeydown = function (e) {
	if (e.ctrlKey && e.shiftKey && (e.keyCode == 'I'.charCodeAt(0) || e.keyCode == 'i'.charCodeAt(0))) {
		 return false;
	}
	if (e.ctrlKey && e.shiftKey && (e.keyCode == 'C'.charCodeAt(0) || e.keyCode == 'c'.charCodeAt(0))) {
		 return false;
	}
	if (e.ctrlKey && e.shiftKey && (e.keyCode == 'J'.charCodeAt(0) || e.keyCode == 'j'.charCodeAt(0))) {
		 return false;
	}
	if (e.ctrlKey && (e.keyCode == 'U'.charCodeAt(0) || e.keyCode == 'u'.charCodeAt(0))) {
		 return false;
	}
	if (e.ctrlKey && (e.keyCode == 'S'.charCodeAt(0) || e.keyCode == 's'.charCodeAt(0))) {
		 return false;
	}
}
$(document).ready(function () {
	cartload();
});

function cartload() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$.ajax({
		url: '/load-cart-data',
		method: "GET",
		success: function (response) {
			//  $('.number-cart').html('');
			var parsed = jQuery.parseJSON(response)
			console.log(parsed)
			var value = parsed; //Single Data Viewing
			//  console.log('number cart: ',response)
			$('.render-number-cart').html(value['totalcart'])
		}
	});
}


$(document).ready(function () {
	$("#addToCart").click(function (e) {
		// var priceProduct = e.target.parentElement.children[2]; price-product
		var nameProduct = $(this).closest('.detail-product-info').find('.name-product').text()
		var priceProduct = $(this).closest('.detail-product-info').find('.price-product span').text()
		var quantityProduct = $(this).closest('.detail-product-info').find('p span').text()
		var idProduct = $(this).closest('.detail-product-info').find('.id_product').val();
		console.log(idProduct)
		$.ajaxSetup({    // POST http://127.0.0.1:8000/login 419 (unknown status)
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		
		$.ajax({
			url: "/addtocart",
			method: "GET",
			data: {
				'id': idProduct,
				'nameProduct': nameProduct,
				'priceProduct': priceProduct,
				'quantityProduct': quantityProduct,
				'quantity': 1
			},
			success: function (data) {
				if(data === "addFailure"){
					swal("", "Thêm vào giỏ thất bại!", "error");
				}else{
					swal("", "Thêm vào giỏ thành công!", "success");
				}
				// console.log("123");
				cartload()
				console.log(data);
				// https://www.youtube.com/watch?v=hEd9Szr9KaU
			},
			error: function (error) {
				console.log("error",error)
				// swal("", "Bị lỗi"+error, "error");
				// alert('error: ', error);
			}
		});
	})

})


$(document).ready(function () {
	
	$(".clearCartKth").click(function (e) {
		var idProduct =  e.target.id;
		console.log('id product', idProduct)
		var data = {
			"id": idProduct,
	  	};
		  $.ajax({
			url: '/clear-cart-kth',
			type: 'DELETE',
			method: "DELETE",
			data: data,
			success: function (response) {
				// console.log(response)
				// swal("", "Thêm vào giỏ thành công!", "success");
				location.reload()
				// cartload()
			}
	  });
	})
})


$(document).ready(function () {
	$('.clear_cart').click(function (e) {
		e.preventDefault();
		$.ajax({
			url: '/clear-cart',
			type: 'GET',
			success: function (response) {
				// console.log(response)
				// swal("", "Bạn có muốn xóa giỏ hàng này không", "error");
				window.location.reload();
				// cartload()
				// alertify.set('notifier', 'position', 'top-right');
				// alertify.success(response.status);
			}
		});
	});
});

$(document).ready(function(){
	$('.minus').click(function(e){
		var idProduct = $(this).closest('.table-infomation').find('.id-hidden').val();
		console.log(idProduct)
		var data = {
			"id": idProduct,
			'changeTo': 'minus'
	  	};
		$.ajax({
			url: '/change-quantity',
			type: 'GET',
			method: "GET",
			data: data,
			success: function (response) {
				location.reload()
				console.log(response)
			}
	  	});
	})
	$('.plus').click(function(e){
		console.log("cong");
		var idProduct = $(this).closest('.table-infomation').find('.id-hidden').val();
		console.log(idProduct)
		var data = {
			"id": idProduct,
			'changeTo': 'plus'
	  	};
		$.ajax({
			url: '/change-quantity',
			type: 'GET',
			method: "GET",
			data: data,
			success: function (response) {
				location.reload()
				console.log(response)
			}
	  });
	})
})

$(document).ready(function(){
	$('#buyNow').click(function(){
		console.log('123');
		var nameProduct = $(this).closest('.detail-product-info').find('.name-product').text()
		var priceProduct = $(this).closest('.detail-product-info').find('.price-product span').text()
		var idProduct = $(this).closest('.detail-product-info').find('.id_product').val();
		console.log(nameProduct, '  ', priceProduct, '  ', idProduct);
		$.ajaxSetup({    // POST http://127.0.0.1:8000/login 419 (unknown status)
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	})
})
