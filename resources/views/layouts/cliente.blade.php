<!DOCTYPE HTML>
<!--
	Traveler by freehtml5.co
	Twitter: http://twitter.com/fh5co
	URL: http://freehtml5.co
-->
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('titulo')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

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

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">

	<!--inserir o javascript (este aqui foi inserido via cdn)-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<link href="{{ asset('/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">
  
	
	
	<script src="{{ asset('/bootstrap/js/jquery.min.js') }}"></script>
	

	<!-- Animate.css -->
	<link rel="stylesheet" href="/css/cli/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="/css/cli/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="/css/cli/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="/css/cli/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="/css/cli/magnific-popup.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="/css/cli/bootstrap-datepicker.min.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="/css/cli/owl.carousel.min.css">
	<link rel="stylesheet" href="/css/cli/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="/css/cli/style.css">

	<!-- Modernizr JS -->
	<script src="/js/cli/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
   

	</head>
	<body>
        
     <!--MODAL-->
  
	 <!-- Button trigger modal -->


	 <?php
    //$enc = new App\Classes\Encri;
	$user_logado =  new App\Http\Controllers\UserAuthController;
	//$user_logado->membro_logado();
	?>
<!-- Modal -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Iniciar Sessao</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('login.user') }}" method="post">
		@csrf
			<div class="py-3">
				<input type="text" name="email" id="email" placeholder="E-mail ou numero de membro" class="form-control" value="{{old('email')}}" 
				required autofocus>
				@error('email')
                    <span class="text-danger"><small>{{$message}}</small></span>
                @enderror
			</div>

			<div>
				<input type="password" name="password" id="password" placeholder="Palavra Passe no minimo 4 digitos" class="form-control" value="{{old('password')}}"
				required autofocus>
				@error('password')
                    <span class="text-danger"><small>{{$message}}</small></span>
                @enderror
			</div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Iniciar Sessao</button>
      </div>
	  </form>
	  <p class="p-2">Esqueceu a palavra passe? <a href="/recuper_password">Recuperar palavra passe</a></p> 
    </div>
  </div>
</div>
  <!--Fim modal-->
		
	<div class="gtco-loader"></div>
	
	<div id="page">


	<!--nav actual-->
	

	<!--fim nav-->
	
	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" style="background-color:#005DAD;" id="nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="/">Agendamento de Viagem </a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul id="items">
						<li><a href="{{ route('lista.voo') }}">Lista de Voos</a></li>
						<li class="has-dropdown">
                        @auth
                        <a href="#"> {{$user_logado->membro_logado()}}</a>
							<ul class="dropdown" id="dropdown">
                                <li><a href="{{ route('membro-dashboard') }}">Ver Detalhes</a></li>
								<li><a href="{{ route('signout') }}">Sair</a></li>
                            </ul>
                            </li>

                        @else
							<a href="#">Minha Conta</a>
							<ul class="dropdown" id="dropdown">
								<li>
								
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong">
									Iniciar Sessao 
								</button>
								<br>
								Ainda não tens conta? <a href="{{ route('register') }}" class="text-primary">Criar uma agora</a> 
                                    
                                </li>
								
							</ul>
                            @endauth
						</li>
						<li><a href="#">Sobre</a></li>
						<li><a href="/conf_bilhete">Gerir Bilhete</a></li>
					</ul>	
				</div>
			</div>
			
		</div>
	</nav>

	

		
		@if(session('msg'))
		<br><br><br>
			<div class="alert alert-primary" role="alert">
				<p class="text-center"><strong>{{session('msg')}}</strong></p>
			</div>
        @endif
        @yield('content')


	<footer id="gtco-footer" style="background-color:#005DAD ;" class="text-white" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-p	b-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>PDC AIRLINE</h3>
						<p class="text-col">Reserva a tua passagem aérea com PDC AIRLINE Reserva a tua viagem aérea com o melhor preço.
						A nossa agência de viagens oferece voos baratos em todo o mundo em várias centenas de companhias aéreas</p>
					</div>
				</div>

				<div class="col-md-3 col-md-push-1">
					<div class="gtco-widget">
						<h3>Destino</h3>
						<ul class="gtco-footer-links">
							<li><a href="#">Europe</a></li>
							<li><a href="#">Australia</a></li>
							<li><a href="#">Asia</a></li>
							<li><a href="#">Canada</a></li>
							<li><a href="#">Dubai</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-4 col-md-push-1">
				
					<div class="gtco-widget ">
						<h3>Siga-nos</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
							<li ><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
							<li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
						</ul>
					</div>
				</div>

			</div>

			

		</div>
	</footer>
	<!-- </div> -->

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><ion-icon name="arrow-up-outline"></ion-icon></a>
	</div>
    
	
	<!-- jQuery -->
	<script src="/js/cli/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="/js/cli/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="/js/cli/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="/js/cli/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="/js/cli/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="/js/cli/jquery.countTo.js"></script>

	<!-- Stellar Parallax -->
	<script src="/js/cli/jquery.stellar.min.js"></script>

	<!-- Magnific Popup -->
	<script src="/js/cli/jquery.magnific-popup.min.js"></script>
	<script src="/js/cli/magnific-popup-options.js"></script>
	
	<!-- Datepicker -->
	<script src="/js/cli/bootstrap-datepicker.min.js"></script>
	

	<!-- Main -->
	<script src="/js/cli/main.js"></script>
    

	<script>
        $('[name="trip"]').on("keypress change keyup",function(){
            if($(this).val() == 1){
                $('#rdate').hide()
            }else{
                $('#rdate').show()
            }
        })
    </script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

	</body>
</html>

