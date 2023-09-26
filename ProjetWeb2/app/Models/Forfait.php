<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forfait extends Model
{
    use HasFactory;

    /**
     * Renvoie les caractéristiques associées à ce forfait.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function caracteristiques()
    {
        return $this->belongsToMany(Caracteristique::class);
    }

    /**
     * Renvoie les utilisateurs qui ont souscrit à ce forfait.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'forfait_user');

        return $this->belongsToMany(Caracteristique::class);
    }
}
