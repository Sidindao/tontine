<?php

namespace App\Http\Controllers;

use App\Models\Echeance;
use App\Http\Requests\StoreEcheanceRequest;
use App\Http\Requests\UpdateEcheanceRequest;
use App\Models\Tontine;
use DateInterval;
use Illuminate\Support\Facades\Auth;
use \Datetime;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class EcheanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Tontine $tontine)
    {
        if(Auth::id()!=$tontine->users_id ){
            session(['info'=>'impossible car cette tontine n\'est pas gérée par vous']);
            return redirect(route('tontine.show',['tontine'=>$tontine]));
        }
        if($tontine->etat!='accepter' ){
            session(['info'=>'impossible ']);
            return redirect(route('tontine.show',['tontine'=>$tontine]));
        }
        $periodicite='';
        if($tontine->perodicite=='quotidien')
        $periodicite=1;
        elseif($tontine->perodicite=='hebdomadaire')
        $periodicite=7;
        elseif($tontine->perodicite=='annuel')
        $periodicite=365;
        else
        $periodicite=30; 
        $tableau=Array();
        $decalge=$periodicite;
        for($i=2;$i<=$tontine->nbEcheance;$i++){
          $element='dateecheance + INTERVAL '.$decalge." DAY";
          array_push($tableau,$element);
          $decalge=$decalge+$periodicite;
        }
         
        DB::beginTransaction();  
        for($i=1;$i<=$tontine->nbEcheance;$i++){
            DB::insert('insert into echeances(dateecheance,numero,tontines_id) values(?,?,?)',[$tontine->dateDeDebut,$i,$tontine->id]);
         
        }
        for($i=2;$i<=$tontine->nbEcheance;$i++){
            DB::update('update echeances set dateecheance='.$tableau[$i-2].' where tontines_id=? and numero=?',[$tontine->id,$i]);
         
        }
        DB::update('update tontines set etat=? where id=?',['encours',$tontine->id]);
       
        DB::commit();


    
       /// $date = new DateTime($debut);
       // die('dd');
         
       // echo $date->format('M d, Y H:i:s');
        
        // Dec 15, 2021 00:00:00
        
       // $interval = new DateInterval('P18DT6M');
        
       // $date->add($interval);
        
        //echo $date->format('M d, Y H:i:s');

        return redirect(route('tontine.show',['tontine'=>$tontine]));
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEcheanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEcheanceRequest $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Echeance  $echeance
     * @return \Illuminate\Http\Response
     */
    public function show(Echeance $echeance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Echeance  $echeance
     * @return \Illuminate\Http\Response
     */
    public function edit(Echeance $echeance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEcheanceRequest  $request
     * @param  \App\Models\Echeance  $echeance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEcheanceRequest $request, Echeance $echeance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Echeance  $echeance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Echeance $echeance)
    {
        //
    }
}
