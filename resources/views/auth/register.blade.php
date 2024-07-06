@extends('base')
@section('body')

<style>
    *{
     margin: 0;
     padding: 0;
     box-sizing: border-box;
    }
    body {
     background-color: rgb(187, 182, 182);
   }
   .shadow-lg {
     align-content: center;
     background: rgb(216, 145, 145);
     border-radius: 0px;
     /* width: 65%; */
     float: center;
     height: 40%;

   }
  
   .btn{
     border: none;
     outline: green; 
     height: 50px;
     width: 83%;
     color: white;
     background-color: black;
     border-radius: 4px ;
     font-weight: bold;
 
   }
   img{
     border-top-left-radius: 30px;
     border-bottom-left-radius: 30px; 
     
   }
   .btn:hover{
     background-color: green;
     color: white;
   }
   .Form{
     margin-top: 10%;
     margin-left: 0%;
   }
   .container{
     height: 30%;
  
     margin-top: 5%;
     margin-left: 5%;
   }

  </style>
<div class="container">
    <div class="laravel">
    <div class='shadow-lg w-50 mx-auto  mb-5  rounded'>
    <div class="py-5 text-center mt-4">
        <img class="d-block-fluid mx-auto mb-2" src="{{asset('image/tontine.png')}}" alt="" width="250" height="65">
        <h1 class="mb-1 text-center">Inscription</h1>
      </div>
   
    <form  class="mx-auto needs-validation" method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <div class="row text-white">
            <div class="col-sm-6">
                <label for="nom" class="form-label">Votre Nom</label>
                <input type="text" class="@error('nom') is-invalid @enderror form-control" id="nom" name="nom"
                    placeholder="Gaye" :value="old('nom')" required>
                <div class="invalid-feedback">
                    obligatoire!
                </div>
                <div class="form-text">
                    @error('nom')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <label for="prenom" class="form-label">Votre Prénom</label>
                <input type="text" class="@error('prenom') is-invalid @enderror form-control" id="prenom"
                    name="prenom" placeholder="Ibrahima" :value="old('prenom')" required>
                <div class="invalid-feedback">
                    obligatoire!
                </div>
                <div class="form-text">
                    @error('prenom')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <label for="ddn" class="form-label">Votre Date De Naissance</label>
                <input type="date" class="@error('ddn') is-invalid @enderror form-control" id="ddn" name="ddn"
                    placeholder="" :value="old('ddn')" required>
                <div class="invalid-feedback">
                    obligatoire!
                </div>
                <div class="form-text">
                    @error('ddn')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>



            <div class="col-12">
                <label for="email" class="form-label">Votre Adresse Email </label>
                <input type="email" class="@error('email') is-invalid @enderror form-control" id="email"
                    name="email" placeholder="sama-tontine@example.com" :value="old('email')" required>
                <div class="invalid-feedback">
                    obligatoire!
                </div>
                <div class="form-text">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12">
                <label for="password" class="form-label">Mot De Passe</label>
                <input type="password" placeholder="*****************" class="@error('password') is-invalid @enderror form-control" id="password"
                    name='password' required>
                <div class="invalid-feedback">
                    obligatoire!
                </div>
                <div class="form-text">
                    @error('password') 
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <label for="password_confirmation" class="form-label">Confirmation Du Mot De Passe</label>
                <input type="password" class="@error('password_confirmation') is-invalid @enderror form-control"
                    id="password_confirmation" name='password_confirmation' placeholder="*****************" required>
                <div class="invalid-feedback">
                    obligatoire!
                </div>
                <div class="form-text">
                    @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>


        <div class="col-12 text-white ">
            <p class="form-label mt-2 text-white">Votre Sexe</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="masculin" name="sexe" id="masculin" >
                <label class="form-check-label" for="masculin">
                    Masculin
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="féminin" name="sexe" id="feminin" checked>
                <label class="form-check-label" for="feminin">
                    Féminin
                </label>
            </div>
        </div>
        <hr class="my-2">
        <div class="col-12 ">
            <div class="form-check ">
                <input class="form-check-input " class="@error('condition') is-invalid @enderror" type="checkbox"
                    name="condition" value="condition" id="condition" aria-describedby="invalidCheck3Feedback" required>
                <label class="form-check-label text-white" for="condition">
                    J'accepte les conditions d'utilisation
                </label>
                <div id="invalidCheck3Feedback" class="invalid-feedback ">
                    vous devez accepter les conditions d'utilisation.
                </div>
                <div class="form-text">
                    @error('condition')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        

        <hr class="my-4">


        <button class="w-100 btn btn-success mb-3 btn-lg" type="submit">S'inscrire</button>
        <p class="text-center text-dark">vous avez une compte ?<a class="text-white"href="{{route('login')}}" >accéder à votre compte.</a></p>
    </form>
    <p class="text-center text-dark ">© 2023 ma-tontine: épargez votre argent</p>
 </div>
</div>
</div>
@endsection

@section('javascript')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
@endsection
