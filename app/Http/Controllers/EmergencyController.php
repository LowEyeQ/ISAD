<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    public function index(){
        return view('Services.EmergencyCall');
    }
    
    public function call(Request $request){

    }
    //
}
