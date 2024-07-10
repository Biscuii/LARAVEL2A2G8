<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateIndisponible extends Model
{
    use HasFactory;

    protected $table = "dates_indisponibles";

    protected $fillable = [
        'bien_immobilier_id', 'date_debut', 'date_fin'
    ];

    public function bienImmobilier()
    {
        return $this->belongsTo(BienImmobilier::class);
    }

}
