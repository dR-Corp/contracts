<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = ['montant', 'datePaiement', 'contrat_id'];

    public function contrat()
    {
        return $this->belongsTo(Contrat::class);
    }
    
}
