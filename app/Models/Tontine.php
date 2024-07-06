<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tontine extends Model
{
    use HasFactory;
      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'label',
        'perodicite',
        'dateDeDebut',
        'nbEcheance',
        'etat',
        'users_id',
    ];
    /**
     * toute tontine a un seul responsable c-a-d un adherant.
     */
    public function monResponsable()
    {
        return $this->belongsTo(User::class,'users_id');
    }
      /**
     * les adherants ayant participer au tontine
     */
    public function mesAdherants()
    {
        return $this->belongsToMany(User::class,'participers','tontines_id','users_id')->withPivot('montant','created_at','updated_at');
    }
      /**
     * un tontine a plusieurs echeances
     */
    public function mesEcheances()
    {
        return $this->hasMany(Echeance::class,'tontines_id');
    }
}
