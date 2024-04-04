<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'dateDebut', 'dateFin', 'montant', 'fichier', 'etat', 'prestataire_id'];

    public function prestataire()
    {
        return $this->belongsTo(Prestataire::class);
    }

    public function taches()
    {
        return $this->hasMany(Tache::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }
    
}
