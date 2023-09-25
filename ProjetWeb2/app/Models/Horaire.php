<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horaire extends Model
{
    use HasFactory;

    protected $dates = ['date'];

    // Relation vers le modèle Groupe
    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }
}
