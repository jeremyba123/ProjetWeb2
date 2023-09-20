<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forfait;
use Illuminate\Support\Facades\Auth;
use App\Models\ForfaitUser;



class EmployeeController extends Controller
{


    public function index() {
        $forfaitsAvecUtilisateurs = Forfait::with('users')->get();

        return view('employee.index', [
            "forfaits" => $forfaitsAvecUtilisateurs,
            "admin" => Auth::user(),
            "forfaits_client" => ForfaitUser::all()

        ]);
    }
}
