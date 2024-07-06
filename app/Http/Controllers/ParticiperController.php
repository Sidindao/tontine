<?php

namespace App\Http\Controllers;

use App\Models\Participer;
use App\Http\Requests\StoreParticiperRequest;
use App\Http\Requests\UpdateParticiperRequest;
use App\Models\Tontine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ParticiperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Tontine $tontine)
    {
      return view('tontine.participer',['tontine'=>$tontine]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreParticiperRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Tontine $tontine,Request $request)
    {
        $request->validate([
            'montant' => ['required', 'integer','min:5'],
            
        ]);
        DB::insert('insert into participers(users_id,tontines_id,montant) values(?,?,?)',[Auth::id(),$tontine->id,$request->montant]);
        return redirect(route('tontine.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participer  $participer
     * @return \Illuminate\Http\Response
     */
    public function show(Participer $participer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participer  $participer
     * @return \Illuminate\Http\Response
     */
    public function edit(Participer $participer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateParticiperRequest  $request
     * @param  \App\Models\Participer  $participer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParticiperRequest $request, Participer $participer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participer  $participer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participer $participer)
    {
        //
    }
}
