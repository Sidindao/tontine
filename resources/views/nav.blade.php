<style>
	
	.container-fluid{
		background: #d89191;
	}
</style>


<div class="container-fluid fixed-top px-0 wow fadeIn shadow-lg p-3 mb-10 " data-wow-delay="0.1s">
	<div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
		<div class="col-lg-6 px-5 text-start">
			<small>
				<i class="fa fa-map-marker-alt text-white  me-2" ;></i>1700 rue, Dakar, Senegal</small>
			<small class="ms-4">
				<i class="fa fa-clock text-white me-2"></i>
				{{ date('d/m/Y') }}</small>


		</div>
		<div class="col-lg-6 px-5 text-end">
			<small>
				<i class="fa fa-envelope text-white me-2"></i>Sama-tontine@gmail.com</small>
			<small class="ms-4">
				<i class="fa fa-phone-alt text-white me-2"></i>+221 33 678-94-32</small>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
		<a
			href="index.html" class="navbar-brand ms-4 ms-lg-0">
			
			<img src="{{asset('image/tontine.png')}}" class="d-block " width="150px" height="60">
		</a>
		<button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<div class="navbar-nav ms-auto p-1 p-lg-0 ">

				<div class="nav-item dropdown text-center">
					<a href="/login" class="btn btn-success me-2" >Connexion</a>

				</div>

				<a href="/register" class="btn btn-success" >S'inscrire</a>
			</div>
			<div class="d-none d-lg-flex ms-2">
				<a class="btn btn-light btn-sm-square rounded-circle ms-3" href="">
					<small class="fab fa-facebook-f text-success"></small>
				</a>
				<a class="btn btn-light btn-sm-square rounded-circle ms-3" href="">
					<small class="fab fa-twitter text-success"></small>
				</a>
				<a class="btn btn-light btn-sm-square rounded-circle ms-3" href="">
					<small class="fab fa-linkedin-in text-success"></small>
				</a>
			</div>
		</div>
	</nav>
</header></div><div class="mx-auto" style="height: 100px;"></div>


