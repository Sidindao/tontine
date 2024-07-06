<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Echeance extends Model
{
    use HasFactory;
      /**
     * un echeance reconnait pluiseurs adherant ayant cotiser
     */
    public function mesAdherants()
    {
        return $this->belongsToMany(User::class,'cotisers','echeances_id','users_id')->withPivot('created_at','updated_at');;
    }
       /**
     * toute echeance a un seul tontine correspondant
     */
    public function monTontine()
    {
        return $this->belongsTo(Tontine::class,'tontines_id');
    }
}
