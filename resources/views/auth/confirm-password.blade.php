

@extends('base')
@section('body')

 <style>
    .mx-auto{
        background-color: rgb(121, 190, 56);
        text-emphasis-color:white;
    }
 </style>
<div class="container-fluid mt-4">
    <div class='shadow-lg w-50 mx-auto  mb-5 bg-body-tertiary rounded'>
    <div class="py-5 text-center mt-4">
        <img class="d-block mx-auto mb-2" src="{{asset('image/IMG_2681.png')}}" alt="" width="250" height="65">
        <p class="mb-1 text-center">Il s'agit d'une zone sécurisée de l'application. Veuillez confirmer votre mot de passe avant de continuer.</p>
      </div>
   
    <form  class="mx-auto needs-validation" method="POST" action="{{ route('password.confirm') }}" novalidate>
        @csrf

        <div class="row text-white">

            <div class="col-12">
                <label for="password" class="form-label">Mot De Passe</label>
                <input type="password" class="@error('password') is-invalid @enderror form-control" id="password"
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
           






        </div>

        <hr class="my-4">


        <button class="w-100 btn btn-success mb-3 btn-lg" type="submit">Confirmer</button>
       
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

