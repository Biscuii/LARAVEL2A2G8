<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientBailleur extends Model
{
    use HasFactory;
    protected $table = 'clients_bailleurs';
    protected $fillable = [
        'user_id', 'note', 'description',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function biensImmobiliers()
    {
        return $this->hasMany(BienImmobilier::class, 'client_bailleur_id');
    }

}

