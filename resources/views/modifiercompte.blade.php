
@extends('base')

@section('title')
    creation de tontine
@endsection
@section('header')
 @include('header')
@endsection


@section('style')
<style>
    form{
        background-color: rgb(121, 190, 56);
        text-emphasis-color:white;
    }
 </style>
@endsection
        
@section('body')

<div class="container-fluid ">
    <div class='shadow-lg w-50 mx-auto  mb-5 bg-body-tertiary rounded'>
    <div class="py-5 text-center mt-4">
        <h1 class="mb-1 text-center">Modification De Votre Compte</h1>
        <p>remplir uniquement les champs que vous vouliez modifier</p>
      </div>
   
    <form  class="mx-auto needs-validation" method="POST" action="{{ route('controller.modifiercompte') }}" novalidate>
        @csrf

        <div class="row text-white">
        


            <div class="col-12">
                <label for="email" class="form-label">Votre Adresse Email </label>
                <input type="email" class="@error('email') is-invalid @enderror form-control" id="email"
                    name="email" placeholder="laravel@example.com" value="{{old('email')}}" >
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
                    name='password' >
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
                    id="password_confirmation" name='password_confirmation' >
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


        <button class="w-100 btn btn-success mb-3 btn-lg" type="submit">Modifier</button>
      
    </form>
</div>
</div>   
@endsection
@section('footer')
<div class="container-fluid">
    @include('footerprincipal')
</div>       
@endsection


