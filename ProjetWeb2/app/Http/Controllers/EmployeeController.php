<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forfait;
use App\Models\ForfaitUser;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
{
    // Fetch all reservations with their arrival date
    $reservations = ForfaitUser::with(['user', 'forfait'])->select('date_darriver', 'forfait_id', 'user_id')->get();


    return view('employee.index', [
        'reservations' => $reservations,
        'admin' => Auth::user(),
    ]);
}


}

