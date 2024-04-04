<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'etat', 'dateDebut', 'dateFin', 'contrat_id'];

    public function contrat()
    {
        return $this->belongsTo(Contrat::class);
    }
    
}
