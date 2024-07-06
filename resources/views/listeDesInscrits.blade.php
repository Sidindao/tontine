@extends('base')

@section('title')
    creation de tontine
@endsection
@section('header')
    @include('header')
@endsection


@section('body')
<h1>{{$paginator->count()}} inscrit(s)</h1>
    <div class="table-responsive">

        <table class="table-bordered border-primary table  text-dark table-striped table-hover">
            <thead>
                <tr class="bg-info">
                    <th scope="col" rowspan="2">Nom</th>
                    <th scope="col" rowspan="2">Prénom</th>
                    <th scope="col" rowspan="2">Date De Naissance</th>
                    <th scope="col" rowspan="2">Email</th>
                    <th scope="col" colspan="3">Nombre Total Tontine Partcipé</th>
                    <th scope="col" colspan="3">Nombre Total Demande Création Tontine</th>
                </tr>
                <tr class="bg-success">
                    <th scope="col" rowspan="2">En attente</th>
                    <th scope="col" rowspan="2">En cours</th>
                    <th scope="col" rowspan="2">Terminée</th>
                    <th scope="col" rowspan="2">Non Traité</th>
                    <th scope="col" rowspan="2">Acceptéé</th>
                    <th scope="col" rowspan="2">Refusée</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paginator as $item)
                <tr>
                    <td>{{$item->nom}}</td>
                    <td>{{$item->prenom}}</td>
                    <td>{{ date('d/m/Y', strtotime($item->dateDeNaissance)) }}</td>
                    <td>{{$item->email}}</td>
                    <td>{{App\Models\User::find($item->id)->mesTontitnesParticiper()->where('etat','accepter')->get()->count()}}</td>
                    <td>{{App\Models\User::find($item->id)->mesTontitnesParticiper()->where('etat','encours')->get()->count()}}</td>
                    <td>{{App\Models\User::find($item->id)->mesTontitnesParticiper()->where('etat','fin')->get()->count()}}</td>
                    <td>{{App\Models\User::find($item->id)->mesTontinesCreer()->where('etat','demande')->get()->count()}}</td>
                    <td>{{App\Models\User::find($item->id)->mesTontinesCreer()->whereIn('etat',['accepter','fin','refuser'])->count()}}</td>
                    <td>{{App\Models\User::find($item->id)->mesTontinesCreer()->where('etat','refuser')->get()->count()}}</td>
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
