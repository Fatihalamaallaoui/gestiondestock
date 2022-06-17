<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
      use HasFactory;
    protected $fillable =
    [
        "id", "entrepots_recepteur",
        "bon_commande","Designations_pr","statut","produit_id","quantite"
    ];


    
    public function produits()
    {
        return $this->HasMany(Produit::class);
    }
}
