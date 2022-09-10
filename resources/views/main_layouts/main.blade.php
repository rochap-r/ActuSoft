<!doctype html>
<html lang="fr">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('logo/icone.png') }}" type="image/png" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="_token" content="{{ csrf_token() }}" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('blog_template/css/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('blog_template/css/icomoon.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ asset('blog_template/css/bootstrap.css') }}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{ asset('blog_template/css/magnific-popup.css') }}">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{ asset('blog_template/css/flexslider.css') }}">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{ asset('blog_template/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('blog_template/css/owl.theme.default.min.css') }}">

	<!-- Flaticons  -->
	<link rel="stylesheet" href="{{ asset('blog_template/fonts/flaticon/font/flaticon.css') }}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ asset('blog_template/css/style.css') }}">

	<link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">

	<!-- Modernizr JS -->
	<script src="{{ asset('blog_template/js/modernizr-2.6.2.min.js')}}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	@yield('custom_css')

	</head>
	<body>


	<div id="page">
		<nav class="colorlib-nav" role="navigation">

			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-md-2">
							<div id="colorlib-logo"><a href="{{route('home')}}" style="color:#24a0ed;">actu<span style="color:#ff0af7 !important;">-</span>soft</a></div>
						</div>
						<div class="col-md-10 text-right menu-1">
							<ul>
								<li><a href="{{ route('home')}}">Accueil</a></li>
								<li class="has-dropdown">
									<a href="{{route('categories.index')}}">Categories</a>
                                    	<ul class="dropdown">
                                            @foreach($navbar_categories as $category)
                                    		    <li><a href="{{ route('category.show',$category) }}">{{ $category->name }} <span class="badge badge-white">{{ $category->posts_count }}</span></a></li>
                                            @endforeach
                                    	</ul>
								</li>
								<li><a href="{{ route('about')}}">A-propos</a></li>
								<li><a href="{{ route('contact.create')}}">Contact</a></li>
								@guest
									<li class="btn-cta"><a href="{{ route('login')}}"><span>Se Connecter</span></a></li>
								@endguest
								@auth
									<li class="has-dropdown">
										<a href="#">{{ auth()->user()->name }} <span class="caret"></span></a>
										<ul class="dropdown">
											<li><a
												onclick="event.preventDefault(); getElementById('nav-logout-form').submit()"
												href="">Déconnexion</a>
											<form id="nav-logout-form" action="{{ route('logout')}}" method="POST">
												@csrf
											</form>
											</li>
										</ul>
									</li>
								@endauth

							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">

			  	</ul>
		  	</div>
		</aside>

		@yield('content')

		<div id="colorlib-subscribe" class="subs-img" style="background-image: url({{ asset('blog_template/images/img_bg_2.jpg') }});" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
						<h2>Abonnez-vous à la newsletter</h2>
						<p>Abonnez-vous à notre newsletter et recevez nos dernières mises à jour</p>
					</div>
				</div>
				<div class="row animate-box">
					<div class="col-md-6 col-md-offset-3">
						<div class="row">
							<div class="col-md-12 ">
								<form class="form-inline qbstp-header-subscribe">
									<div class="col-three-forth">
										<div class="form-group">
											<input name="subscribe_name" type="text" required class="form-control" id="name" placeholder="Votre Nom">
										</div>
									</div>
									<div class="col-three-forth">
										<div class="form-group">
											<input name="subscribe_email" type="email" required class="form-control" id="email" placeholder="Votre Email">
										</div>
									</div>
									<div class="col-one-third ">
										<div class="form-group">
											<button id="subscribe_btn" type="submit" class="btn btn-primary">Je m'abonne</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer id="colorlib-footer">
			<div class="container">
				<div class="row row-pb-md block-footer">
					<div class="col-md-3 colorlib-widget">
						<h4>Informations de contact</h4>
						<ul class="colorlib-footer-links">
							<li><a href="tel://243992522582"><i class="icon-phone"></i> +243 992522582</a></li>
							<li><a href="mailto:info@actu-soft.com"><i class="icon-envelope"></i> info@actu-soft.com</a></li>
							<li><a href="https://www.actu-soft.com"><i class="icon-location4"></i> actu-soft.com</a></li>
						</ul>
					</div>
					<div class="col-md-2 colorlib-widget">
						<h4>Liens utiles</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="{{route('home')}}"><i class="icon-check"></i> Accueil</a></li>
								<li><a href="{{ route('about') }}"><i class="icon-check"></i> Apropos</a></li>
								<li><a href="{{route('categories.index')}}"><i class="icon-check"></i> Categories</a></li>
								<li><a href="{{ route('contact.create')}}"><i class="icon-check"></i> Contact</a></li>
							</ul>
						</p>
					</div>

					<div class="col-md-3 colorlib-widget">
						<h4>Services</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="{{ route('about')}}"><i class="icon-check"></i> Création de site web</a></li>
								<li><a href="{{ route('about')}}"><i class="icon-check"></i> Formations</a></li>
								<li><a href="{{ route('about')}}"><i class="icon-check"></i> Coaching TFC & Mém</a></li>
								<li><a href="{{ route('about')}}"><i class="icon-check"></i> Gestion de sites web</a></li>
							</ul>
						</p>
					</div>

					<div class="col-md-4 colorlib-widget">
						<h4>Articles récents</h4>
                        @foreach ( $rb_posts as $recent_post )
                            <div class="f-blog">
                                <a href="{{route('post.show',$recent_post)}}" class="blog-img" style="background-image:url({{ $recent_post->image ? asset('storage/'.$recent_post->image->path.'') : 'https://via.placeholder.com/600x400?text=actu-soft.com'}}) ">
                                </a>
                                <div class="desc">
                                    <h2><a href="{{route('post.show',$recent_post)}}">{{\Str::limit($recent_post->title,20)}}</a></h2>
                                    <p class="admin"><span>{{$recent_post->created_at->diffForHumans()}}</span></p>
                                </div>
                            </div>
                        @endforeach
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<p>
								<small class="block">&copy;
									<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
									Copyright &copy;<script>document.write(new Date().getFullYear());</script>
									Tous les droits sont réservés | créé avec
									<i class="icon-heart text-danger" aria-hidden="true"></i>
									par
									<a href="{{ route('about')}}" target="_blank" class="text-primary">actu-soft</a>
								</small>
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>

	<!-- jQuery -->
	<script src="{{ asset('blog_template/js/jquery.min.js') }}"></script>
	<!-- jQuery Easing -->
	<script src="{{ asset('blog_template/js/jquery.easing.1.3.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('blog_template/js/bootstrap.min.js') }}"></script>
	<!-- Waypoints -->
	<script src="{{ asset('blog_template/js/jquery.waypoints.min.js') }}"></script>
	<!-- Stellar Parallax -->
	<script src="{{ asset('blog_template/js/jquery.stellar.min.js') }}"></script>
	<!-- Flexslider -->
	<script src="{{ asset('blog_template/js/jquery.flexslider-min.js') }}"></script>
	<!-- Owl carousel -->
	<script src="{{ asset('blog_template/js/owl.carousel.min.js') }}"></script>
	<!-- Magnific Popup -->
	<script src="{{ asset('blog_template/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('blog_template/js/magnific-popup-options.js') }}"></script>
	<!-- Counters -->
	<script src="{{ asset('blog_template/js/jquery.countTo.js') }}"></script>
	<!-- Main -->
	<script src="{{ asset('blog_template/js/main.js') }}"></script>
	<script src="{{ asset('js/functions.js') }}"></script>
	<script>
		$(function(){
			var code='';
			function isEmail(email) {
				var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				return regex.test(email);
			}
			$(document).on("click","#subscribe_btn",(e)=>{
				e.preventDefault();
				let _this= $(e.target)
				let name= _this.parents("form").find("input[name='subscribe_name']").val();
				let email= _this.parents("form").find("input[name='subscribe_email']").val();
				console.log(email)
				if(!isEmail(email)){
					$("body").append("<div class='global-message alert alert-danger suscribe_error'> Votre adresse email n'est pas valide!</div>")
					code="error";
				}else{
					/*Ajax implementation*/
					let formData= new FormData();
					let _token=$("meta[name='_token']").attr("content");
					formData.append('_token',_token)
					formData.append('email',email)
					formData.append('name',name)
					$.ajax({
						url:"{{ route('newsletter.store') }}",
						type:"POST",
						dataType:"JSON",
						processData:false,
						contentType:false,
						data:formData,
						success:(response)=>{
							let message=response.message;
							$("body").append("<div class='global-message alert alert-success suscribe_success'>"+message+"</div>")
                            //code de message d'erreur ou de succes
							code="success";

						},
                        statusCode: {
                            500: ()=>{
                                $("body").append("<div class='global-message alert alert-danger suscribe_error'>L'adresse email que vous avez fourni est invalide!</div>")
                                //code de message d'erreur ou de succes
                                code="error";
                            }
                        }
					});
				}
				setTimeout(()=>{ $(".suscribe_"+code).fadeOut() },5000)
				clearData($(_this).parents("form"),['subscribe_name','subscribe_email']);
			});

		});

	</script>

	@yield('custom_js')


	</body>
</html>
