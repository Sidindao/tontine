@extends('base')

@section('title')
    creation de tontine
@endsection
@section('header')
    @include('header')
@endsection


@section('style')
    <style>
        .mx-auto {
            background-color: rgb(121, 190, 56);
            text-emphasis-color: white;
        }
    </style>
@endsection

@section('body')
    @if (session('info') !== null)
        <div class="alert alert-success" role="alert">
            {{ session()->remove('info') }}
        </div>
    @endif
    <h1 class="text-center text-uppercase">Détail tontine {{ $tontine->label }}</h1>

    <div class="card ">
        <div class="card-header bg-success">
            <p class="text-uppercase">description : {{ $tontine->label }}</p>
        </div>
        <div class="card-body">

            <p><strong>Début :</strong>{{ date('d/m/Y', strtotime($tontine->dateDeDebut)) }}</p>
            <p><strong>Nombre d'échéances prévues : </strong>{{ $tontine->nbEcheance }}
                @if ($tontine->etat == 'accepter' && $tontine->users_id == Auth::id())
                    <a href="{{ route('echeance.create', ['tontine' => $tontine]) }}" class="btn btn-primary">Générer</a>
                @endif
                @if ($tontine->etat == 'encours')
                    <p>

                        @foreach ($tontine->mesEcheances as $item)
                            <a href="#" class="btn btn-success">{{ date('d/m/Y', strtotime($item->dateEcheance)) }}</a>
                            &emsp;
                        @endforeach
                    </p>
                    @if ($tontine->monResponsable->id==Auth::id())
                    <p><a href="{{route('tontine.terminertontine',['tontine'=>$tontine->id])}}" class="btn btn-primary">Mettre fin la tontine</a></p>
                    @endif
                    
                @endif
            </p>
        </div>
        @if ($tontine->etat == 'accepter')
            <div class="card-footer   bg-success">
                <p> Etat : la tontine est en cours. Revenez réguliérement sur cette page pour voir les dates d'échéances
                    afin que vous puissiez démarrer les paiements
                </p>
            </div>
        @endif
        @if ($tontine->etat == 'refuser')
            <div class="card-footer   bg-success">
                <p> Etat : la création de ce tiontine a été refusé par l'administrateur</p>
            </div>
        @endif
        @if ($tontine->etat == 'fin')
        <p>

            @foreach ($tontine->mesEcheances as $item)
                <a href="#" class="btn btn-success">{{ date('d/m/Y', strtotime($item->dateEcheance)) }}</a>
                &emsp;
            @endforeach
        </p>
            <div class="card-footer  bg-success">
                <p> Etat :tontine Terminée
                    @if ($tontine->monResponsable->id==Auth::id())
                    <br><a class='text-center text-white' href="{{route('tontine.telechargerinformation',['tontine'=>$tontine->id])}}" class="btn btn-primary">Télécharger Les Informations</a>
                    @endif
                </p>
            </div>
        @endif
        @if ($tontine->etat == 'encours')
            <div class="card-footer  bg-success">
                <p> Etat : la tontine est toujours en cours</p>
            </div>
        @endif
        @if ($tontine->etat == 'demande')
            <div class="card-footer  bg-success">
                <p> Etat : l'administrateur n'a pas encore aprouvéé la création de cette tontine</p>
            </div>
        @endif

    </div>


    <hr>


    <div class="card ">
        <div class="card-header bg-success">
            <p class="text-uppercase"> {{ App\Models\Participer::all()->where('tontines_id', $tontine->id)->count() }}
                participant(s)</p>
        </div>
        <div class="card-body">
            @if (App\Models\Participer::where('tontines_id', $tontine->id)->where('users_id', Auth::id())->first() != null)
                <p><strong>{{ Auth::user()->prenom }} {{ Auth::user()->nom }} (Vous)</strong></p>
                <p>Cotisation :
                    {{ App\Models\Participer::where('tontines_id', $tontine->id)->where('users_id', Auth::id())->first()->montant }}
                    CFA </p>
                <p>
                    @foreach (Auth::user()->mesEcheancesCotiser()->where('tontines_id', $tontine->id)->get() as $item)
                        <a href="#" class="btn btn-primary">{{ date('d/m/Y', strtotime($item->dateEcheance)) }}</a>
                        &emsp;
                    @endforeach
                </P>

                @if (session('infose') !== null)
                <div class="alert alert-success" role="alert">
                    {{ session()->remove('infose') }}
                </div>
                @endif
                @if (
                    $tontine->etat == 'encours' &&
                        Auth::user()->mesEcheancesCotiser()->where('tontines_id', $tontine->id)->get()->count() != $tontine->nbEcheance)
                    <p> <a href="{{ route('cotiser.create', ['tontine' => $tontine]) }}" class="btn btn-primary">payer</a></p>
                @endif
                <hr>
                @foreach ($tontine->mesAdherants()->where('users_id', '<>', Auth::id())->get() as $item)
                    <p><strong>{{ $item->prenom }} {{ $item->nom }} </strong></p>
                    <p>Cotisation :
                        {{ App\Models\Participer::where('tontines_id', $tontine->id)->where('users_id', $item->id)->first()->montant }}
                        CFA
                    </p>
                    <p>
                        @foreach ($item->mesEcheancesCotiser()->where('tontines_id', $tontine->id)->get() as $em)
                            <a href="#" class="btn btn-primary">{{ date('d/m/Y', strtotime($em->dateEcheance)) }}</a>
                            &emsp;
                        @endforeach
                    </P>
                    <hr>
                @endforeach
            @else
                @foreach ($tontine->mesAdherants()->get() as $item)
                    <p><strong>{{ $item->prenom }} {{ $item->nom }} </strong></p>
                    {{-- <p>Cotisation :
                        {{ App\Models\Participer::where('tontines_id', $tontine->id)->where('users_id', $item->id)->first()->montant }}
                        CFA
                    </p> --}}
                    <hr>
                @endforeach
            @endif


        </div>

    </div>
@endsection
@section('footer')
    <div class="container-fluid">
        @include('footerprincipal')
    </div>
@endsection
