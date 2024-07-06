

@extends('base')

@section('title')
    Page D'acceuil
@endsection

<style>

    .text{
        color:  rgb(15, 223, 15);
    }
</style>
@section('nav')
    @include('nav')
    <div class="container">
        <div class="mx-auto" style="height: 100px;"></div>
        <div class="container marketing">
    
    
    
    
            <div class="clearfix">
                <img src="{{asset('image/hist.jpg')}}"class="col-md-6 float-md-end mb-3 ms-md-3" alt="...">
                <h1 class="text">Un peu d’histoire…</h1>
                <p>
                    Inventée au XIIème siècle par le banquier italien Lorenzo Tonti, la tontine a d’abord été créée dans le but de renflouer les caisses du Roi Soleil… Ce système a depuis été sensiblement modifié, mais le principe reste globalement le même : un groupement de personnes s’engagent, chaque mois, à verser une certaine somme d’argent. Après un certain délai – fixé par les participants à la tontine –  l’argent récolté sera alors versé à l’un des membres – pris au hasard ou choisi selon d’autres critères – ou partagé entre tous.

                    Dans de nombreux pays, la tontine est encore utilisée, notamment en en Afrique subsaharienne et en Asie.
                    
                    Dans certaines communautés implantées en France, elle est parfois utilisée en dehors de tout cadre légal et permet de financer à tour de rôle l’achat de matériels électro-ménagers ou de voitures…   </p>
              </div>

              <div class="clearfix">
                <img src="{{asset('image/verse.jpg')}}"class="col-md-6 float-md-end mb-3 ms-md-3" alt="...">
                <h1 class="text">Une durée d’épargne de 2 à 10 ans</h1>
                <p>
                    La version moderne de la tontine existe et, en France, est régie par le code des assurances.

Ces associations ont une durée de vie comprise entre 10 et 25 ans, et prévoient soit un versement unique lors de la souscription, soit la possibilité de versements réguliers.

Au terme, les fonds sont reversés aux adhérents, déduction faite des frais de gestion de l’association. Pour faire face à l’aléa de « prédécès » de l’assuré, il est possible (et recommandé) de souscrire à une contre-assurance apportée pour garantir à ses héritiers le versement, au minimum, du capital versé. Les sociétés à forme tontinière ne peuvent pas s’engager sur un rendement minimal ou sur un capital garanti au terme. C’est donc seulement lors de la dissolution que les épargnants connaitront le rendement final de leur investissement.
 </div>

 <div class="clearfix">
    <img src="{{asset('image/file64.webp')}}"class="col-md-6 float-md-end mb-3 ms-md-3" alt="...">
    <h1 class="text">La tontine « immobilière »</h1>
    <p>
        Il existe également une « clause tontinière » pour l’achat d’un bien immobilier à deux. Chacun des acquéreurs est alors propriétaire du bien acheté. Et, au décès du premier, la clause de tontine permet de rendre le survivant seul propriétaire du logement, et ce quelle que soit sa part versée lors de l’achat. Toutefois, l’avantage de ce système est assez limité puisque le conjoint survivant paie alors des droits de succession réduits dans la limite d’une valeur globale de 76 000 €. Au-delà, ce sont les droits de mutation normaux qui s’appliquent.
        Avec environ 57 % de propriétaires immobiliers, la France se situe en queue de peloton des pays européens. Mais l’accès à la propriété reste l’une des priorités des Français. Ainsi, de nombreux dispositifs fiscaux visent à encourager l’acquisition de sa résidence principale ainsi que l’investissement locatif dans le neuf ou l’ancien. Que vous soyez locataire, futur acquéreur ou que vous hésitiez encore, cette rubrique vous est destinée. Vous y trouverez des éléments clés pour envisager sereinement vos projets immobiliers.
    </p>
 </div>
@endsection


        
@section('body')
    
@endsection
@section('footer')
    @include('footer')
            </div>
@endsection
