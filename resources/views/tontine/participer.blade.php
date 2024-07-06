
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
   
   
    
    <h1>Adhérer à une tontine </h1>
   			

   
    <div class='shadow-lg w-50 mx-auto  mb-5 bg-body-tertiary rounded'>
<form  class="mx-auto needs-validation w-100" method="POST" action="{{ route('participer.store',['tontine'=>$tontine->id]) }}" novalidate>
    @csrf

    <div class="row text-white">
        


        <div class="col">
            <label for="montant" class="form-label">Montant </label>
            <input type="number" class="@error('montant') is-invalid @enderror form-control" id="montant"
                name="montant"  :value="old('montant')" required>
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
        <button class="w-100 btn btn-success  btn-lg" type="submit">Adherer</button>
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
