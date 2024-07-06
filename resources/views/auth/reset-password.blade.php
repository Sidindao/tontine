

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
        <h1 class="mb-1 text-center">Réinitialisation Mot De Passe</h1>
      </div>
   
    <form  class="mx-auto needs-validation" method="POST"  action="{{ route('password.store') }}" novalidate>

        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

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
            <div class="col-12">
                <label for="password_confirmation" class="form-label">Confirmation Du Mot De Passe</label>
                <input type="password" class="@error('password_confirmation') is-invalid @enderror form-control"
                    id="password_confirmation" name='password_confirmation' required>
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


       

        <hr class="my-4">


        <button class="w-100 btn btn-success mb-3 btn-lg" type="submit">réinitialiser le mot de passe</button>
       
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

