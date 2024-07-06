<?php

namespace App\Http\Controllers;

use App\Mail\ReponseDemandeTontine;
use App\Models\Tontine;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Mail;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        $users = DB::table('users')
            ->paginate(2);

        return view('listeDesInscrits', ['paginator' => $users]);
    }
    public function reponseCreationTontine(Tontine $tontine, $type)
    {

        if ($type == 'accepter')
            DB::update('update tontines set etat=? where id=?', ['accepter', $tontine->id]);
        else {
            DB::update('update tontines set etat=? where id=?', ['refuser', $tontine->id]);
        }
        $tontine = Tontine::find($tontine->id);
        Mail::to($tontine->monResponsable->email)
            ->send(new ReponseDemandeTontine($tontine));


        return redirect(route('tontine.lesDemandesCreationTontine'));
    }
    public function modifierCompte(Request $request)
    {
        $val = $request->validate([
            'email' => ['string', 'email','nullable', 'max:255', 'unique:' . User::class],
            'password' => ['confirmed','nullable', Rules\Password::defaults()],
        ]);
        if ($val) {
            $user = User::find(Auth::id());
            if ($request->password)
                $user->password = Hash::make($request->password);
            if ($request->email)
                $user->email = $request->email;
            $user->save();
        }
        return view('modifiercompte');
    }
}
