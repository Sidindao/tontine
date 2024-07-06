

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
<div class="container-fluid mt-5">
    <div class='shadow-lg w-50 mx-auto  mb-5 bg-body-tertiary rounded'>
    <div class="py-5 text-center mt-4">
        <img class="d-block mx-auto mb-2" src="{{asset('image/IMG_2681.png')}}" alt="" width="250" height="65">
        <p class="mb-1 text-justify">Merci pour votre inscription! Avant de commencer, pourriez-vous vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer ? Si vous n'avez pas reçu l'e-mail, nous vous en enverrons un autre avec plaisir.</p>
      </div>
   
    <form  class="mx-auto needs-validation" method="POST" action="{{ route('verification.send') }}" novalidate>
        @csrf


      


        <button class="w-100 btn btn-success mb-3 btn-lg" type="submit"> Renvoyer l'e-mail de vérification</button>
        
    </form>
    <p class="text-center text-success">© 2023 ma-tontine: épargez votre argent</p>
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

