<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showLocation()
    {
        return view('location'); // แสดงหน้าเว็บที่มีชื่อว่า 'user.location'
    }
}

