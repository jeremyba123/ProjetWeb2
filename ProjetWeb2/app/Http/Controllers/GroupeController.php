<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    public function index()
    {
        return view("groupes", [

            "groupes" => Groupe::all(),
        ]);
    }
}
