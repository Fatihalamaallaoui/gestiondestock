<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrepot extends Model
{
    use HasFactory;
      use HasFactory;
    protected $fillable =
    [
        "id", "ville",
        "adresse" ,"phone"
    ];
}
