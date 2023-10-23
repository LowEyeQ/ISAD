<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use App\Models\LocationEmergencyCall;

use App\Models\EmergencyCall;
class EmergencyController extends Controller
{
    public function index(){
        return view('Services.EmergencyCall');
    }

    public function store(Request $request)
{

    $request->validate([
        'additional_image' => 'image|nullable',
      ]);

    $imagePath = null;
    if($request->hasFile('additional_image')) {
        $imagePath = $request->file('additional_image')->store('public');
        $imagePath = str_replace('public/', 'storage/', $imagePath);

    }

    // Upload and store the image
    // Get the latitude and longitude from the request
    $currentDateTime = Carbon::now(); // ดึงวันที่และเวลาปัจจุบัน
    $currentDateTimeGMTPlus7 = $currentDateTime->copy()->addHours(7); // เพิ่ม 7 ชั่วโมงเพื่อเปลี่ยนไปเป็น GMT+7
    $timestringGMTPlus7 = $currentDateTimeGMTPlus7->toTimeString(); // แปลงเป็นรูปแบบเวลา (HH:MM:SS)
    $latitude = $request->input('latitude');
    $longitude = $request->input('longitude');
    $name = $request->input('name');
    $user = auth()->user();
    if($user){
        $user_id = $user->user_id;
        $user_id= str_pad($user_id, 6, '0', STR_PAD_LEFT);
    }else{
        $user_id = null;
    }



    $inserted = EmergencyCall::create([
        'user_id' => $user_id,
        'latitude' => $latitude,
        'longitude' => $longitude,
        'name' => $name,
        'additional_image' => $imagePath,
        'created_at' =>$timestringGMTPlus7 ,
    ]);


    return redirect()->route('emergency-call'); // ส่งผู้ใช้กลับไปที่หน้า admin
    }
}
