<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClientController extends Controller
{
     /**
     * Affiche la liste des notes de cours
     *
     * @return View
     */
    public function index() {
        return view('client.index', [
            "forfaits" => auth()->user()->forfaits
        ]);
    }
}
