<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestataire extends Model
{
    use HasFactory;

    // Nom de la table
    protected $table = 'prestataire';

    // Clé primaire personnalisée
    protected $primaryKey = 'id_prestataire';

    // Les attributs qui sont assignables
    protected $fillable = [
        'user_id',
        'description',
        'domaine',
        'valide_profile',
        'address',
        'city',
        'postal_code',
        'country',
        'experience_years',
        'certifications',
        'specialties',
        'availability',
    ];

    protected $casts = [
        'valide_profile' => 'integer',
        'availability' => 'boolean',
        'rating' => 'float',
        'experience_years' => 'integer',
        'reviews' => 'integer',
    ];

    // Définir la relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

