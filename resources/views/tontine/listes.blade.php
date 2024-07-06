@extends('base')

@section('title')
    creation de tontine
@endsection
@section('header')
    @include('header')
@endsection


@section('body')
<h1>{{$paginator->count()}} tontine(s) disponbile(s)</h1>
    <div class="table-responsive">

        <table class="table table-info text-dark table-striped table-hover">
            <thead>
                <tr class="bg-success">
                    <th scope="col">Label</th>
                    <th scope="col">Périodicité</th>
                    <th scope="col">Date De Début</th>
                    <th scope="col">Nombre Echéance</th>
                    <th scope="col">Créateur</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paginator as $item)
                <tr>
                    <td>{{$item->label}}</td>
                    <td>{{$item->perodicite}}</td>
                    <td>{{ date('d/m/Y', strtotime($item->dateDeDebut)) }}</td>
                    <td>{{$item->nbEcheance}}</td>
                    <td> {{App\Models\User::find($item->users_id)->prenom}} {{App\Models\User::find($item->users_id)->nom}}</td>
                    <td> <a href="{{route('participer.create',['tontine' => $item->id])}}" class="btn btn-primary">Adhérer</a></td>
                    
                </tr>
              
                @endforeach
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination w-25 mx-auto text-center">
          <li class="page-item"><a class="page-link" href="{{$paginator->previousPageUrl()}}">Précédent</a></li>
          <li class="page-item"><a class="page-link" href="{{$paginator->nextPageUrl()}}">Suivant</a></li>
        </ul>
      </nav>
@endsection
@section('footer')
    <div class="container-fluid">
        @include('footerprincipal')
    </div>
@endsection
