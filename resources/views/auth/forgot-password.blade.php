

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
     border-radius: 20px;
     /* width: 65%; */
     float: center;
     height: 50%;
    
   }
   /* .col-lg-7{
     box-shadow: 10px rgb(119, 208, 99);
   } */
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
   /* a,p{
     text-align: center;
   } */
  </style>
<div class="container-fluid mt-4">
    <div class='shadow-lg w-50 mx-auto   rounded'>
    <div class="py-5 text-center mt-4">
        <img class=" mx-auto mb-2" src="{{asset('image/tontine.png')}}" alt="" width="250" height="65">
        <p class="mb-1 text-center text-dark">Mot de passe oublié? Aucun problème. Indiquez-nous simplement votre adresse e-mail et nous vous enverrons par e-mail un lien de réinitialisation de mot de passe qui vous permettra d'en choisir un nouveau.</p>
      </div>
   
    <form  class="mx-auto needs-validation" method="POST" action="{{ route('password.email') }}" novalidate>
        @csrf

        <div class="row text-white">
            <div class="col-12">
                <label for="email" class="form-label">Votre Adresse Email </label>
                <input type="email" class="@error('email') is-invalid @enderror form-control" id="email"
                    name="email" placeholder="laravel@example.com" :value="old('email')" required>
                <div class="invalid-feedback">
                    obligatoire!
                </div>
                <div class="form-text">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>


        <button class="w-100 btn btn-success mb-3 btn-lg" type="submit">Envoyer</button>
        
    </form>
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
