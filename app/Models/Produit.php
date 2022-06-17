<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
     protected $fillable =
    [
        "id", "prix",
        "Designations", "image","description","qauntite_minimale","category_id","entrepot_id","quantite"
    ];


    public function commandes()
    {
        return $this->belongsToMany(Commande::class);
    }
}
