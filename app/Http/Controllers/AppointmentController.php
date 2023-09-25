<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
class AppointmentController extends Controller
{
    function index(){
        return view('calendar');
    }

    public function store(Request $request)
    {
        $lastAppointment = Appointment::latest('appointment_id')->first();

        // หาค่า appointment_id ล่าสุด
        $lastAppointmentId = $lastAppointment->appointment_id ?? '000';

        // สร้าง appointment_id ใหม่
        $newAppointmentId = str_pad((int)$lastAppointmentId + 1, 20, '0', STR_PAD_LEFT);

        $pet_id =$request->input('pet_id');
        $appointment_date = $request->input('appointment_date');
        $appointment_time = $request->input('appointment_time');
        $reason = $request->input('reason');
        $inset = Appointment ::insert(['pet_id' => $pet_id,
        'appointment_date' => $appointment_date ,
        'appointment_time' => $appointment_time,
        'reason' => $reason,
        'appointment_id' => $newAppointmentId

    ]);


        return redirect('calendar')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }
}
