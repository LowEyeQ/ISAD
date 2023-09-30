<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $latestUser = User::latest('user_id')->first();
        $latestUserId = $latestUser->user_id ?? '000';

        

// เพิ่ม 1 เข้าไปเพื่อสร้าง user_id ใหม่
        $newUserId = str_pad((int)$latestUserId + 1, 6, '0', STR_PAD_LEFT);
        
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        

        echo "<script>alert('$request->firstname');</script>";
        
        $user = User::create([
            'username' => $request->username,
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'gender' => $request->gender,
            'phone_number' => $request->phonenumber,
            'password' => Hash::make($request->password),
            'user_id' => $newUserId,// กำหนดค่า user_id ใหม่
        ]);
        event(new Registered($user));
        
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
