<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForfaitUser extends Model
{
    use HasFactory;


    protected $table = "forfait_user";

    /**
     * Récupère l'utilisateur associé à ce forfait utilisateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Récupère l'utilisateur associé à ce forfait utilisateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function forfait()
    {
        return $this->belongsTo(Forfait::class);
    }
}
