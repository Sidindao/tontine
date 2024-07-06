
@extends('base')

@section('title')
    creation de tontine
@endsection
@section('header')
 @include('header')
@endsection


@section('style')
<style>
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
@endsection
        
@section('body')
<div class="container-fluid">
   
   
    @if (Auth::user()->profil=='user')
    <h1 class="text-center">Demande De Création De Tontine.</h1>
    @else
    <h1 class="text-center">Création De Tontine.</h1>
    @endif			
						

   
    <div class='shadow-lg w-50 mx-auto  mb-5 bg-body-tertiary rounded'>
<form  class="mx-auto needs-validation w-100" method="POST" action="{{ route('tontine.store') }}" novalidate>
    @csrf

    <div class="row text-white">
        <div class="col-sm-6">
            <label for="label" class="form-label">Nom</label>
            <input type="text" class="@error('label') is-invalid @enderror form-control" id="label" name="label"
                 :value="old('label')" required>
            <div class="invalid-feedback">
                obligatoire!
            </div>
            <div class="form-text">
                @error('label')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-sm-6">
            <label for="periodicite" class="form-label">Périodicité</label>
            <select id='periodicite' class="form-select" aria-label="Default select example" name="perodicite">
                <option value="quotidien" selected>Quotidien</option>
                <option value="hebdomadaire">Hebdomadaire</option>
                <option value="mensuel">Mensuel</option>
                <option value="annuel">Annuel</option>
            </select>
            
            <div class="invalid-feedback">
                obligatoire!
            </div>
            <div class="form-text">
                @error('periodicite')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <label for="ddd" class="form-label">Date De Début</label>
            <input type="date" class="@error('ddd') is-invalid @enderror form-control" id="ddd" name="ddd"
                placeholder="" :value="old('ddd')" required>
            <div class="invalid-feedback">
                obligatoire!
            </div>
            <div class="form-text">
                @error('ddd')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>



        <div class="col-sm-6">
            <label for="nbEcheance" class="form-label">Nombre Echéance </label>
            <input type="number" class="@error('nbEcheance') is-invalid @enderror form-control" id="nbEcheance"
                name="nbEcheance"  :value="old('nbEcheance')" required>
            <div class="invalid-feedback">
                obligatoire!
            </div>
            <div class="form-text">
                @error('nbEcheance')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        

    <hr class="my-4">
    <div class="col">
        <button class="w-100 btn btn-dark  btn-lg" type="submit">creer une tontine</button>
    </div>


   
   
</form>
</div>
</div>    
@endsection
@section('footer')
<div class="container-fluid">
    @include('footerprincipal')
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
