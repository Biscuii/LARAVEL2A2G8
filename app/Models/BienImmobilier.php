<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BienImmobilier extends Model
{
    use HasFactory;

    protected $table = 'biens_immobiliers';

    protected $fillable = [
        'client_bailleur_id', 'titre', 'description', 'adresse', 'prix',
        'nombre_de_chambres', 'nombre_de_salles_de_bain', 'superficie', 'type_de_bien',
        'nombre_de_lits', 'capacite_max', 'wifi', 'parking', 'climatisation',
        'chauffage', 'cuisine', 'animaux_acceptes', 'statut', 'message_refus'
    ];

    public function clientBailleurOwner()
    {
        return $this->belongsTo(ClientBailleur::class, 'client_bailleur_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function datesIndisponibles()
    {
        return $this->hasMany(DateIndisponible::class);
    }

    public function getStatutTextAttribute()
    {
        switch ($this->statut) {
            case 0:
                return 'En attente';
            case 1:
                return 'Validé';
            case 2:
                return 'Refusé';
            default:
                return 'Inconnu';
        }
    }


}
