<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\VideocallAppoint;
class VideoAppointController extends Controller
{
    function index(){
        return view('Services.appoinment_videocall');
    }

    public function store(Request $request){
        $user = auth()->user();
        $user_id = $user->user_id;
        $formatted_user_id = str_pad($user_id, 6, '0', STR_PAD_LEFT);

        $lastAppointment = VideocallAppoint::latest('videocall_id')->first();

        // หาค่า appointment_id ล่าสุด
        $lastAppointmentId = $lastAppointment->videocall_id ?? '000';

        // สร้าง appointment_id ใหม่
        $newAppointmentId = str_pad((int)$lastAppointmentId + 1, 20, '0', STR_PAD_LEFT);
        $appointment_date = $request->input('appointment_date');
        $appointment_time_end  = $request->input('appointment_time_end');
        $appointment_time_start  = $request->input('appointment_time_start');
        $reason = $request->input('reason');

        // บันทึกข้อมูลลงในตาราง Appointment
        $inserted = VideocallAppoint::create([
            'videocall_id' => $newAppointmentId,
            'user_id' => $formatted_user_id,
            'date' => $appointment_date,
            'veterinary_id' => "0000001",
            'time_end' =>  $appointment_time_end    ,
            'time_start' => $appointment_time_start    ,
        ]);



    return redirect()->route('videocall.index');
    }
}
