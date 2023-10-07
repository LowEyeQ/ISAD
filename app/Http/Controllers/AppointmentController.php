<?php

namespace App\Http\Controllers;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Appointment;
class AppointmentController extends Controller
{
    function index(){
        $user = auth()->user();
    // ดึงรายการสัตว์เลี้ยงของผู้ใช้
    $userPets = Pet::where('user_id', $user->user_id)->get();

        return view('Services.appointment', [
        'userPets' => $userPets,
        ]);
    }

    public function store(Request $request)
    {
        $lastAppointment = Appointment::latest('appointment_id')->first();

        // หาค่า appointment_id ล่าสุด
        $lastAppointmentId = $lastAppointment->appointment_id ?? '000';

        // สร้าง appointment_id ใหม่
        $newAppointmentId = str_pad((int)$lastAppointmentId + 1, 20, '0', STR_PAD_LEFT);
        $pet_id = $request->input('pet_selection'); // เปลี่ยนจาก 'pet_id' เป็น 'pet_selection'
        $appointment_date = $request->input('appointment_date');
        $appointment_time = $request->input('appointment_time');
        $reason = $request->input('reason');

        // บันทึกข้อมูลลงในตาราง Appointment
        $inserted = Appointment::create([
            'appointment_id' => $newAppointmentId,
            'pet_id' => $pet_id,
            'appointment_date' => $appointment_date,
            'appointment_time' => $appointment_time,
            'reason' => $reason,
        ]);



    return redirect()->route('appointment.index'); // ส่งข้อความ success ไปยังหน้าก่อนหน้า;

    }

}
