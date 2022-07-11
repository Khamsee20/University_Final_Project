<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Themelight</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- google fonts -->
		<script src="https://kit.fontawesome.com/a96ba3954a.js" crossorigin="anonymous"></script>

		   <script src="{{ asset('js/app.js') }}" defer></script>

		<!-- Css link -->
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="../../../../css/font-awesome.min.css">
		<link rel="stylesheet" href="../../../../css/owl.carousel.css">
		<link rel="stylesheet" href="../../../../css/owl.transitions.css">
		<link rel="stylesheet" href="../../../../css/animate.min.css">
		<link rel="stylesheet" href="../../../../css/lightbox.css">
		<link rel="stylesheet" href="../../../../css/bootstrap.min.css">
		<link rel="stylesheet" href="../../../../css/preloader.css">
		<link rel="stylesheet" href="../../../../css/image.css">
		<link rel="stylesheet" href="../../../../css/icon.css">
		<link rel="stylesheet" href="../../../../css/style.css">
		<link rel="stylesheet" href="../../../../css/responsive.css">
        <link rel="stylesheet" href="../../../../css/my.css">
		<link rel="stylesheet" href="../../../../css/search.css">
		{{-- <link rel="stylesheet" href="css/app.css"> --}}

	</head>




	<body id="top">
	

        <header id="navigation" class="navbar-fixed-top animated-header">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
                    </button>
					<!-- /responsive nav button -->
					
					<!-- logo -->
					<h1 class="navbar-brand">
						<a href="#body"><h2 style="font-size: 2.5rem; color:slategray; margin-top: 12px">ຍິນດີຕອນຮັບ : {{ Auth::user()->name}} </h2></a>
					</h1>
					<!-- /logo -->
                </div>

				<!-- main nav -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <ul id="nav" class="nav navbar-nav menu">
					
                        <li><a href="{{ route('users.index','#top') }}">ໜ້າຫຼັກ</a></li>
                        <li><a href="{{ route('users.index','#portfolio') }}">ຫ້ອງແຖວ</a></li>
                        <li><a href="{{ route('users.index','#pricing-table') }}">ລາຍການຈອງ</a></li>
                        <li><a href="{{ route('users.index','#team') }}">ກ່ຽວກັບພວກເຮົາ</a></li>
                        <li><a href="{{ route('users.index','#contact-form') }}">ຕິດຕໍ່ພວກເຮົາ</a></li>

							{{-- <!-- Right Side Of Navbar -->
				<ul class="navbar-nav ms-auto">
					<!-- Authentication Links --> --}}
						@guest
						@if (Route::has('login'))
							<li class="nav-item">
								<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
							</li>
						@endif

						@if (Route::has('register'))
							<li class="nav-item">
								<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
							</li>
						@endif
					@else
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								ອອກຈາກລະບົບ 
							</a>

							<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ route('logout') }}"
								   onclick="event.preventDefault();
												 document.getElementById('logout-form').submit();"  style="color:orangered">
									{{ __('ຄລິກເພີ່ອອກຈາກລະບົບ') }}
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
								</form>
							</div>
						</li>
					
					@endguest
					<li>
						<form action="{{ route('user_room.search') }}" method="GET" class="form-inlin my-2 my-lg-0">
							<div class="search-box">
								@csrf
								<input name="query" type="text" class="firstbox" placeholder=" ຄົົ້ນຫາຫ້ອງແຖວ...">
								<button class="btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>

							  </div>
						  </form>
					</li>
				</ul>
			</ul>


			
                </nav>
				<!-- /main nav -->
				
            </div>
        </header>


		@yield('content')


		<!-- load Js -->
		<script src="../../../../js/jquery-1.11.3.min.js"></script>
		<script src="../../../../js/bootstrap.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBI14J_PNWVd-m0gnUBkjmhoQyNyd7nllA"></script>
		<script src="../../../../js/waypoints.min.js"></script>
		<script src="../../../../js/lightbox.js"></script>
		<script src="../../../../js/jquery.counterup.min.js"></script>
		<script src="../../../../js/owl.carousel.min.js"></script>
		<script src="../../../../js/html5lightbox.js"></script>
		<script src="../../../../js/jquery.mixitup.js"></script>
		<script src="../../../../js/wow.min.js"></script>
		<script src="../../../../js/jquery.scrollUp.js"></script>
		<script src="../../../../js/jquery.sticky.js"></script>
		<script src="../../../../js/jquery.nav.js"></script>
		<script src="../../../../js/main.js"></script>
	</body>
</html>