<?php

namespace App\Http\Controllers;

use App\Models\Cotiser;
use App\Models\User;
use App\Http\Requests\StoreCotiserRequest;
use App\Http\Requests\UpdateCotiserRequest;
use App\Models\Echeance;
use App\Models\Tontine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CotiserController extends Controller
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
        
        if(User::find(Auth::id())->mesEcheancesCotiser()->where('tontines_id',$tontine->id)->get()->count()==0){
          $info=Echeance::where('tontines_id',$tontine->id)->where('numero',1)->first();
          
            DB::insert('insert into cotisers(users_id,echeances_id) values(?,?)',[Auth::id(),$info->id]);  
        }
        else{
              $info=User::find(Auth::id())->mesEcheancesCotiser()->where('tontines_id',$tontine->id)->orderByDesc('numero')->get();
             
             foreach($info as $ech){
                $in=Echeance::where('tontines_id',$tontine->id)->where('numero',($ech->numero+1))->first();
                DB::insert('insert into cotisers(users_id,echeances_id) values(?,?)',[Auth::id(),$in->id]); 
                break; 
             }

             
            }
            session(['infose'=>'cotisation enregistrée']);
        //Echeance::where('tontines_id',$tontine_id);
       // DB::insert('insert into cotisers(users_id,echeances_id) values(?,?)',[Auth::id(),$idecheance]);
        return redirect(route('tontine.show',['tontine'=>$tontine]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCotiserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCotiserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cotiser  $cotiser
     * @return \Illuminate\Http\Response
     */
    public function show(Cotiser $cotiser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cotiser  $cotiser
     * @return \Illuminate\Http\Response
     */
    public function edit(Cotiser $cotiser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCotiserRequest  $request
     * @param  \App\Models\Cotiser  $cotiser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCotiserRequest $request, Cotiser $cotiser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cotiser  $cotiser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotiser $cotiser)
    {
        //
    }
}
