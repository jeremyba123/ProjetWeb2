<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Groupe extends Model
{
    use HasFactory;



    public function horaire()
    {
        return $this->hasOne(Horaire::class);
    }
}
