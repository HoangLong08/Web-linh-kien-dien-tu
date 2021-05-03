<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="Shop uy tin chất lượng cao">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<title> @yield('title')</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="shortcut icon" href="{{ asset('asset/img/icon_shop.jpg') }}" />
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/style.css') }}">
	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">


	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
	


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
	{{-- 
		@include('includes.header')
		<script src="{{$src}}"></script>
		https://viblo.asia/p/toi-uu-code-voi-advance-search-trong-laravel-gDVK26AeKLj
	 --}}
	{{View::make('components.header')}}
	@yield('content')
	
	{{View::make('components.footer')}}
	@yield('script')
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="{{ asset('asset/js/index.js') }}"></script>
	<script>
		
		$(window).scroll(function() {
			var sticky = $('.scroll'),
				scroll = $(window).scrollTop();
				
			if (scroll > 0) { 
				sticky.hide();
				$(".container-header").innerHeight(64)
			}
			else { 
				sticky.show();
				$(".container-header").innerHeight(104)
			}
		});
	</script>
</body>
</html>