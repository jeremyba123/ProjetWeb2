<?php

namespace App\Http\Controllers;

use App\Models\Caracteristique;
use App\Models\Forfait;
use Illuminate\Http\Request;

class ForfaitController extends Controller
{
    public function index()
    {

        return view("forfaits", [
            "forfaits" => Forfait::all(),
            "caracteristiques" => Caracteristique::all()
        ]);
    }
}
