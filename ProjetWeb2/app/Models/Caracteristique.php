<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caracteristique extends Model
{
    use HasFactory;

    /**
     * Renvoie les forfaits associés à cette caractéristique.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function forfaits()
    {
        return $this->belongsToMany(Forfait::class);
    }
}
