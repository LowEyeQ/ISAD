<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocController extends Controller
{
    function doc(){
        return view('paper.certificate');
    }
}
