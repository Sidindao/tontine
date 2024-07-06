<style>
	.container-fluid{
	
    background-color: rgb(187, 182, 182);
  
	}
	/* .offcanvas-body{
		background: rgb(216, 145, 145);
	} */
   img{
	background: rgb(216, 145, 145);
   }
   .fs-4{
	background: rgb(216, 145, 145);

   }
   .dropdown-item{
	background: rgb(216, 145, 145);
   }
   
  </style>
<div class='container-fluid'>
	
	<header class="py-3 mb-3 border-bottom">
		<div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
			<button class="btn btn-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">MENU</button>

			<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
				<div class="offcanvas-header">
					<h5 class="offcanvas-title" id="offcanvasScrollingLabel">
						<a href='dashboard' title="aller à la page d'acceuil"><img class="mb-4" src="{{asset('image/tontine.png')}}" alt="" width="100%" height="70"></a>
					</h5>
					<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				</div>
				<div class="offcanvas-body">

					<div class="fs-4 text-center text-white  w-100">
						<i class="fa-solid fa-users text-white"></i>
						Adhérant
					</div><hr>

					<ul class="nav nav-pills flex-column mb-auto">
						@if (Auth::user()->profil=='user')
						<li>
							<a href="{{route('tontine.create')}}" class="nav-link link-dark">
								Demande Création Tontine
							</a>
						</li>
						@endif
						
						<li class="nav-item dropdown">
							<a class="nav-link link-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Mes Tontines
							</a>
							<ul class="dropdown-menu">
								<li>
									<a class="dropdown-item" href="{{route('tontine.mestontinescreer')}}">Crées</a>
								</li>
								<li>
									<a class="dropdown-item" href="{{route('tontine.mestontinesparticipers')}}">Participées</a>
								</li>


							</ul>

						</li>
						<li>
							<a href="{{route('tontine.index')}}" class="nav-link link-dark">
								Tontines Disponible
							</a>
						</li>
						

					</ul>


					
					@if (Auth::user()->profil=='admin')
					
						<div class="fs-4 text-center btn btn-success w-100">
							<i class="fa-solid fa-user"></i>
							Administrateur</div><hr>
						<ul class="nav nav-pills flex-column mb-auto">
							<li class="nav-item dropdown">
								<a class="nav-link link-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									Lister
								</a>
								<ul class="dropdown-menu">
									<li>
										<a class="dropdown-item" href=" {{route('tontine.lesDemandesCreationTontine')}}">Demandes De Création De Tontine</a>
									</li>
									<li>
										<a class="dropdown-item" href="{{route('controller.index')}}">Tous Les Inscrits</a>
									</li>


								</ul>

							</li>
							<li>
								<a href="{{route('tontine.create')}}" class="nav-link link-dark">
									Ajouter Une Tontine
								</a>
							</li>

							


							<li class="border-top my-3"></li>

						</ul>

					@endif
					<div class="fs-4 text-center  text-white  w-100">
						<i class="fa-solid fa-gears text-white"></i>
						Paramétrages
					</div>
					<ul class="nav nav-pills flex-column mb-3">
						<li>
							<a href="{{route('controller.modifiercompte')}}" class="nav-link link-dark">

								Modifier mon compte
							</a>
						</li>


					</ul>
				</div>
			</div>

			<div class="d-flex align-items-center">
				

					<form class="w-100 me-3" role="search">
						<input type="hidden" class="form-control" placeholder="Search..." aria-label="Search">
					</form>

				<div class="flex-shrink-0 dropdown">
					<a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						<img src="{{asset('image/tt.jpg')}}" alt="" width="32" height="32" class="rounded-circle">
						{{Auth::user()->prenom}}
						{{Auth::user()->nom}}
					</a>
					<ul class="dropdown-menu text-small shadow ">

						<li>
							<a class="dropdown-item btn btn-success " href="/logout">Déconnexion</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

	</header>
</div>