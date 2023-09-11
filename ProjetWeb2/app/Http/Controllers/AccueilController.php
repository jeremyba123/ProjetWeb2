<?php

namespace App\Http\Controllers;


use App\Models\Groupe;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index()
    {
        return view('index', [
            "groupes" => Groupe::all()
        ]);
    }
}
