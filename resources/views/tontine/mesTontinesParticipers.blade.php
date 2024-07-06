@extends('base')

@section('title')
    creation de tontine
@endsection
@section('header')
    @include('header')
@endsection


@section('body')
<h1>{{Auth::user()->mesTontitnesParticiper->count()}} tontine(s) paricipée(s)</h1>
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
                @foreach (Auth::user()->mesTontitnesParticiper()->orderBy('etat')->get() as $item)
                <tr>
                    <td>{{$item->label}}</td>
                    <td>{{$item->perodicite}}</td>
                    <td>{{ date('d/m/Y', strtotime($item->dateDeDebut)) }}</td>
                    <td>{{$item->nbEcheance}}</td>
                    <td> {{App\Models\User::find($item->users_id)->prenom}} {{App\Models\User::find($item->users_id)->nom}}</td>
                    <td> <a href="{{route('tontine.show',['tontine' => $item->id])}}" class="btn btn-primary">Détails</a></td>
                    
                </tr>
              
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('footer')
    <div class="container-fluid">
        @include('footerprincipal')
    </div>
@endsection
