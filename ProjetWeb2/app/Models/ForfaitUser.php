<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForfaitUser extends Model
{
    use HasFactory;

    protected $table = "forfait_user";

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
