
@extends('base')

@section('title')
    Page principal
@endsection
@section('header')
 @include('header')
@endsection

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

        

@section('body')
<div class="list-group w-50 m-auto bg-success">
    <h1 class="list-group w-50 m-auto">Informations</h1>
    <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
        <i class="fa-solid fa-user text-success"></i>
        <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
                <h6 class="mb-0">Nom</h6>
                <p class="mb-0 opacity-75">{{Auth::user()->nom}}</p>
            </div>
            <small class="opacity-50 text-nowrap"></small>
        </div>
    </a>
    <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
       
        <i class="fa-solid fa-user text-success"></i>
        <div class="d-flex gap-2 w-100 justify-content-between ">
            <div>
                <h6 class="mb-0 ">Prenom</h6>
                <p class="mb-0 opacity-75">{{Auth::user()->prenom}}</p>
            </div>
            <small class="opacity-50 text-nowrap"></small>
        </div>
    </a>
    

    <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
        <i class="fa-regular fa-calendar-days text-success"></i>
        <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
                <h6 class="mb-0">Date de Naissance</h6>
                <p class="mb-0 opacity-75">{{  date('d/m/Y', strtotime(Auth::user()->dateDeNaissance ))}}</p>
            </div>
            <small class="opacity-50 text-nowrap"></small>

        </div>
    </a>


    <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
        <i class="fa-solid fa-envelope text-success"></i>
        <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
                <h6 class="mb-0">Email</h6>
                <p class="mb-0 opacity-75">{{Auth::user()->email}}</p>
            </div>
            <small class="opacity-50 text-nowrap"></small>
        </div>
    </a>
   
    <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
        <i class="fa-brands fa-creative-commons-nd text-success"></i>
        <div class="d-flex gap-2 w-100 justify-content-between ">
            <div>
                <h6 class="mb-0">Nombre De Tontines crées</h6>
                <p class="mb-0 opacity-75">{{ Auth::user()->mesTontinesCreer()->count()}}</p>
            </div>
            <small class="opacity-50 text-nowrap"></small>

        </div>
    </a>
    <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
        <i class="fa-brands fa-creative-commons-nd text-success"></i>
        <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
                <h6 class="mb-0">Nombre De Tontines Participéés</h6>
                <p class="mb-0 opacity-75">{{ Auth::user()->mesTontitnesParticiper()->count()}}</p>
            </div>
            <small class="opacity-50 text-nowrap"></small>

        </div>
    </a>
   
    
</div>


    
@endsection
@section('footer')
    @include('footerprincipal')
        
@endsection