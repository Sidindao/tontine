<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
       h1,h2{
        opacity: 100%;
        text-align: center;
        position: relative;

        color: rgb(22, 5, 91);
       

       }
       th,td{
        border: solid;
       }
       th{
        background-color: blue;
       }
       table{
        width: 70%;
        margin: auto;
        text-align: center;
        border-collapse: collapse;
       }
       body{
        background-image: url('image/IMG_2681.png');
        background-repeat: repeat-x;
        opacity: 50%;
       }
    </style>
    <h1>Listes Des Participants De Votre Tontine Et leurs montants totales cotisés</h1>
    <h2> <span><strong>Nom Tontine :</strong>{{$tontine->label}}</span>
    </h2>
    <div>

        <table>
            <thead>
                <tr>
                    <th >Nom</th>
                    <th >Pénom</th>
                    <th >Date De Naissance</th>
                    <th >Cotisation</th>
                    <th >Montant Total</th>
                 
                </tr>
            </thead>
            <tbody>
                @foreach ($tontine->mesAdherants()->get() as $item)
                <tr>
                    <td> {{ $item->nom }}</td>
                    <td>{{ $item->prenom }}</td>
                    <td>
                        {{  date('d/m/Y', strtotime($item->dateDeNaissance ))}}</td>
                    <td>
                        {{ App\Models\Participer::where('tontines_id', $tontine->id)->where('users_id', $item->id)->first()->montant }}
                        CFA
                    </td>
                    <td>
                        {{ $item->mesEcheancesCotiser()->where('tontines_id', $tontine->id)->count() * 
                        App\Models\Participer::where('tontines_id', $tontine->id)->where('users_id', $item->id)->first()->montant }}
                        CFA
                    </td>
                </tr>
              
                @endforeach
            </tbody>
        </table>
    </div>


</body>
</html>
