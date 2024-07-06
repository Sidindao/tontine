<?php

namespace App\Http\Controllers;

use App\Models\Tontine;
use App\Models\User;
use App\Http\Requests\StoreTontineRequest;
use App\Http\Requests\UpdateTontineRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class TontineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verifier = DB::table('participers')->select('tontines_id')->where('participers.users_id', '=', Auth::id());

        $users = DB::table('tontines')
            ->whereIn('etat', ['encours', 'accepter'])
            ->whereNotIn('id', $verifier)
            ->paginate(2)
            // ->get()
            // ->orderBy('etat')


        ;

        return view('tontine.listes', ['paginator' => $users]);
    }
    public function terminerTontine(Tontine $tontine)
    {
        DB::update('update tontines set etat=? where id=?', ['fin', $tontine->id]);
        return redirect(route('tontine.show', ['tontine' => $tontine]));
    }
    //telecharger fichier pdf 
    public function telechargerFichierPdf(Request $request, Tontine $tontine)
    {

        $pdf = Pdf::loadView('telechargerInfoTontine',['tontine'=>$tontine]);
       return $pdf->download('invoice.pdf');
    //   return response()
    //         ->view('telechargerInfoTontine',['tontine'=>$tontine])
    //         ->header('Content-Type', 'text/pdf');
    }


    public function listerLesDemandeCreationTontine()
    {


        $users = DB::table('tontines')
            ->where('etat', 'demande')
            ->paginate(3)
            // ->get()
            // ->orderBy('etat')


        ;

        return view('listeDesDemandeCreationTontine', ['paginator' => $users]);
    }

    public function mesTontinesParticipers()
    {
        return view('tontine.mesTontinesParticipers');
    }
    public function mesTontinesCreer()
    {
        return view('tontine.mesTontinesCreer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tontine.creer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTontineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'label' => ['required', 'string', 'max:255'],
            'ddd' => ['required', 'date', 'max:70'],
            'nbEcheance' => ['required', 'integer', 'min:1'],
            'perodicite' => ['required', 'string', 'max:55'],
        ]);

        $tontine = null;
        // dd($request->periodicite);
        if (Auth::user()->profil == 'user') {
            $tontine = Tontine::create([
                'label' => $request->label,
                'perodicite' => $request->perodicite,
                'dateDeDebut' => $request->ddd,
                'nbEcheance' => $request->nbEcheance,
                'etat' => 'demande',
                'users_id' => Auth::id(),
            ]);
            session(['info' => 'votre tontine est crée avec succée vous receverez un message mail 
            dés que l\'administrateur a traité votre demande']);
        } else {
            session(['info' => 'votre tontine est crée avec succée']);
            $tontine = Tontine::create([
                'label' => $request->label,
                'perodicite' => $request->perodicite,
                'dateDeDebut' => $request->ddd,
                'nbEcheance' => $request->nbEcheance,
                'etat' => 'accepter',
                'users_id' => Auth::id(),
            ]);
        }

        return redirect(route('tontine.show', ['tontine' => $tontine]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tontine  $tontine
     * @return \Illuminate\Http\Response
     */
    public function show(Tontine $tontine)
    {

        return view('tontine.vue', ['tontine' => $tontine]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tontine  $tontine
     * @return \Illuminate\Http\Response
     */
    public function edit(Tontine $tontine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTontineRequest  $request
     * @param  \App\Models\Tontine  $tontine
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTontineRequest $request, Tontine $tontine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tontine  $tontine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tontine $tontine)
    {
        //
    }
}
