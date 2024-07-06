<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
  </head>
  <body>
    <h1>Salut {{$tontine->monResponsable->prenom}}  {{$tontine->monResponsable->nom}}</h1>
    <p> nous vous informons que l'administrateur 
        @if ($tontine->etat=='accepter')
            a acceptée votre demande de création de tontine <strong>{{$tontine->label}}</strong>.
        @else
        a refusée votre demande de création de tontine <strong>{{$tontine->label}}</strong>.
        @endif
    </p>
    <p>Accéder à votre compte<a href="{{route('tontine.mestontinescreer')}}">cliquez moi</a></p>
  </body>
</html>
