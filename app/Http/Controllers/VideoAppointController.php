<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\VideocallAppoint;
use App\Models\NotifyRecord;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use ArielMejiaDev\LarapexCharts\LarapexChart; // Correct the namespace here


class VideoAppointController extends Controller
{
    function index(){
        $data = [
            'dates' => ['2023-10-01', '2023-10-02', '2023-10-03', '2023-10-04', '2023-10-05'],
            'values' => [15, 22, 18, 30, 25],
        ];

        $chart = (new LarapexChart)->barChart()
            ->setTitle('Daily Bar Chart')
            ->setXAxis($data['dates'])
            ->setDataset([
                [
                    'name' => 'Daily Appointments',
                    'data' => $data['values'],
                ],
            ]);
        return view('Services.appoinment_videocall', compact('chart'));
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
            'date' => $appointment_date ,
            'veterinary_id' => "0000001",
            'time_end' =>  $appointment_time_end,
            'time_start' => $appointment_time_start,
        ]);

           $lastNotifyRecord = NotifyRecord::latest('notify_id')->first();
           $lastNotifyRecordId = $lastNotifyRecord->notify_id ?? '000';
           $newnotify_id = str_pad((int)$lastNotifyRecordId+ 1, 10, '0', STR_PAD_LEFT);

           $currentDateTime = Carbon::now(); // ดึงวันที่และเวลาปัจจุบัน
           $currentDateTimeGMTPlus7 = $currentDateTime->copy()->addHours(7); // เพิ่ม 7 ชั่วโมงเพื่อเปลี่ยนไปเป็น GMT+7
           $timestringGMTPlus7 = $currentDateTimeGMTPlus7->toTimeString(); // แปลงเป็นรูปแบบเวลา (HH:MM:SS)
           $datestringGMTPlus7 = $currentDateTimeGMTPlus7->toDateString(); // แปลงเป็นรูปแบบวันที่ (YYYY-MM-DD)

           $user_first = $user->first_name;
           $user_last= $user->last_name;

           $data= [
            'time' => $timestringGMTPlus7,
            'date' => $datestringGMTPlus7,
            'date_appoint' => $appointment_date,
            'time_end' =>  $appointment_time_end,
            'time_start' =>$appointment_time_start,
            'topic' => 'Videocall',
            'firstname' =>  $user_first,
            'lastname' =>  $user_last,
            'reason' => $reason,
           ];

           $to = $email = auth()->user()->email;
           Mail::to($to) ->send(new \App\Mail\NotificationMail($data));

           NotifyRecord::create([
            'notify_id' => $newnotify_id,
            'topic' => 'VideoCall',
            'date' =>   $datestringGMTPlus7,
            'time' => $timestringGMTPlus7,
            'recipient_id' => $formatted_user_id,
        ]);

    return redirect()->route('videocall.index');
    }

}
