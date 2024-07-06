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
  .row {
    align-content: center;
    background: rgb(216, 145, 145);
    border-radius: 20px;
    float: center;
    height: 50%;
   
  }

  .btn1{
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
  .shadow{
    height: 30%;
    margin-top: 5%;
    margin-left: 5%;
  }
 
 </style>

 
<div class="container ">
    <div class='shadow rounded'>
    <div class='row g-0'>
    <div class='col'>
        <img class="d-block mx-auto mb-2" src="{{asset('image/tt.jpg')}}" alt="" width="100%" height="100%">
    </div>
    <div class="col">
    <div class="py-5 text-center mt-4">
        <img class="d-block mx-auto mb-2" src="{{asset('image/tontine.png')}}" alt="" width="250" height="65">
        <h1 class="mb-1 text-center">Authentification</h1>
      </div>
   
    <form  class="mx-auto needs-validation" method="POST" action="{{ route('login') }}" novalidate>
        @csrf

        <div class="row text-white">
           
         



            <div class="col-12">
                <label for="email" class="form-label">Votre Adresse Email  </label>
                <input  type="email"   class="@error('email') is-invalid @enderror form-control" id="email"
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
                <input type="password" class="@error('password') is-invalid @enderror form-control" id="password"
                    name='password' placeholder="******************"required>
                <div class="invalid-feedback">
                    obligatoire!
                </div>
                <div class="form-text">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
           






        </div>


        <hr class="my-2">
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input " class="@error('condition') is-invalid @enderror" type="checkbox"
                    name="remember" value="condition" id="condition" aria-describedby="invalidCheck3Feedback" >
                <label class="form-check-label text-white" for="condition">
                    souviens-toi de moi
                </label>
            </div>
        </div>
        

        <hr class="my-4">


        <button class="w-100 btn1 btn-success mb-3 btn-lg" type="submit">Se connecter</button>
        <p class="text-center text-dark">vous avez oublié votre mot de passe? <a class="text-white"href="{{route('password.request')}}" > réinitialiser</a></p>
        <p class="text-center text-dark"> Vous n'avez pas de  compte <a class="text-white"href="{{route('register')}}" >Creer un nouveau Compte</a></p>
    </form>
  
</div>
</div>
<p class="text-center text-dark">© 2023 ma-tontine: épargez votre argent</p>
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



