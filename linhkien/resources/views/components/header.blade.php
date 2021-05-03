<header>
	<div class="container-header">
		<a href="/">
			<h3>LoThPh</h3>
		</a>
		<div class="input-group mb-3 header-search">
			<form action="{{url('/search')}}" type="GET" class="form-search">
				<input type="text" class="form-control" name="keyword" placeholder="Tìm kiếm sản phẩm" >
				<div class="input-group-append">
				  <button type="submit" class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></button>
				</div>
			</form>
		</div>
		<ul class="header-menu">
			<li title="Liên hệ">
				<a href="/contact">
					<div class="text-center" style="font-size: 24px">
						<span><i class="far fa-phone"></i></span>
					</div>
					<div class="scroll">
						<span >Liên hệ</span>
					</div>
				</a>
			</li>
			<li title="Giỏ hàng" class="cart-wrapp" >
				<a href="/cart">
					<div class="text-center " style="font-size: 24px">
						<span><i class="far fa-shopping-cart"></i></span>
					</div>
					<div class="scroll ">
						<span >Giỏ hàng</span>
					</div>
					<div class="number-cart ">
						<span class="text-center render-number-cart"></span>
					</div>
				</a>
			</li>
			@if(Session::has('user'))
				<li class="hover-user" title="Trang cá nhân">
					<a href="/profile">
						<div class="text-center" style="font-size: 24px">
							<span><i class="far fa-user"></i></span>
						</div>
						<div class="scroll">
							<span >{{Session::get('user')['account']}}</span>
						</div>
					</a>
					<ul class="sub-menu">
						<li>
							<div class="text-center" style="font-size: 24px">
								<span><i class="far fa-user"></i></span>
							</div>
							<div class="text-center">
								<span >{{Session::get('user')['name']}}</span>
							</div>
						</li>
						<li>
							<a href="/profile" class="sub-a"> <span><i class="far fa-user"></i></span> Thông tin tài khoản</a>
						</li>
						<li>
							<a href="/profile/manager-order" class="sub-a"><span><i class="fal fa-clipboard-check"></i></span>Quản lý đơn hàng</a>
						</li>
						<li>
							<a href="/profile/change-password" class="sub-a"><span><i class="far fa-sync-alt"></i></i></span>Đổi mật khẩu</a>
						</li>
						<li>
							<a class="btn btn-primary form-control sub-ab" href="{{ url('/logout') }}"> Đăng xuất </a>
						</li>
					</ul>
				</li>
			@else	
				<li title="Đăng nhập">
					<a href="/login">
						<div class="text-center" style="font-size: 24px">
							<span><i class="far fa-sign-in-alt"></i></span>
						</div>
						<div class="scroll">
							<span >Đăng nhập</span>
						</div>
					</a>
				</li>
				<li title="Đăng ký">
					<a href="/register">
						<div class="text-center" style="font-size: 24px">
							<span><i class="far fa-book"></i></span>
						</div>
						<div class="scroll">
							<span >Đăng ký</span>
						</div>
					</a>
				</li>
			@endif
			
		</ul>
		
	</div>
</header>
