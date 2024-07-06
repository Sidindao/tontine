<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'dateDeNaissance',
        'sexe',
        'profil',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * un user(un adherant) a plusieurs tontine creer.
     */
    public function mesTontinesCreer()
    {
        return $this->hasMany(Tontine::class,'users_id');
    }
    /**
     * un user(un adherant) adhere  a plusieurs tontines
     */
    public function mesTontitnesParticiper()
    {
        return $this->belongsToMany(Tontine::class,'participers','users_id','tontines_id')->withPivot('montant','created_at','updated_at');
    }
     /**
     * un user(un adherant) cotise a plusierus echeances
     */
    public function mesEcheancesCotiser()
    {
        return $this->belongsToMany(Echeance::class,'cotisers','users_id','echeances_id')->withPivot('created_at','updated_at');
    }
}
