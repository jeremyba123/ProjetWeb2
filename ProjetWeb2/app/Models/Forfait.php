<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forfait extends Model
{
    use HasFactory;
    public function caracteristiques()
    {
        return $this->belongsToMany(Caracteristique::class);
    }
}
