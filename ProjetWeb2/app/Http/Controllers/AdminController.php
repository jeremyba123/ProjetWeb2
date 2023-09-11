<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forfait;

class AdminController extends Controller
{
     /**
     * Affiche la liste des notes de cours
     *
     * @return View
     */
    public function index() {
        return view('admin.index', [
            "forfaits" => auth()->user()->forfaits
        ]);
    }
}
