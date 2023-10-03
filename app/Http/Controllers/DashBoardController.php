<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashBoardController extends Controller
{
    //
    function dashboard(){
        $user = Auth::user();
        $userPets = $user->pets->pluck('pet_id')->toArray();
        $pets = $user->pets;
        return view('dashboard', ['pets' => $pets]);
    }


}
