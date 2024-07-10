<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_arrivee', 'date_depart', 'montant_total' // on voit pr ajouter +
    ];
    public function bienImmobilier()
    {
        return $this->belongsTo(BienImmobilier::class);
    }

    public function voyageur()
    {
        return $this->belongsTo(Voyageur::class); // voir si faut ajouter plusieurs voyageur a une reservationV
    }

}
