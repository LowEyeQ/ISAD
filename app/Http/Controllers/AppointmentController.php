<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Models\Pet;
use App\Models\User;
use App\Models\NotifyRecord;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use ArielMejiaDev\LarapexCharts\BarChart;

class AppointmentController extends Controller
{
    function index(Request $request){
        $user = auth()->user();
    // ดึงรายการสัตว์เลี้ยงของผู้ใช้ Request $request
    $userPets = Pet::where('user_id', $user->user_id)->get();

    $selectedDate = $request->input('appointment_date');

    $appointments = Appointment::selectRaw('hour(appointment_time) as hour, count(*) as count')
            // ->whereDate('appointment_date', $selectedDate)
            ->groupBy('hour')
            ->get();

        // Prepare data for the chart
        $chart = new BarChart();
        $chart->setTitle('Appointment Count by Time Interval');
        $chart->setColors(['#8ccbff']);
        $chart->setWidth(500);

        // Initialize data arrays for each time interval
        $intervals = ['Midnight to 6 AM', '6 AM to Noon', 'Noon to 6 PM', '6 PM to Midnight'];
        $data = [0, 0, 0, 0];

        // Define an array of colors for each bar in the chart
        $colors = ['#FF5733', '#FFC300', '#33FF51', '#338BFF'];

        // Fill data based on the hour
        foreach ($appointments as $key => $appointment) {
            $hour = $appointment->hour;
            if ($hour >= 0 && $hour < 6) {
                $data[0] += $appointment->count;
            } elseif ($hour >= 6 && $hour < 12) {
                $data[1] += $appointment->count;
            } elseif ($hour >= 12 && $hour < 18) {
                $data[2] += $appointment->count;
            } elseif ($hour >= 18 && $hour < 24) {
                $data[3] += $appointment->count;
            }

            // Assign color based on the index

        }

        // Set X-axis labels
        $chart->setXAxis($intervals);
        // Add data to the chart
        $chart->addData('Appointment Count', $data);

        // return view('Services.appointment', ['userPets' => $userPets,], compact('chart'));
        return view('Services.appointment', ['userPets' => $userPets, 'chart' => $chart,], compact('chart'));
    }

    public function store(Request $request)
    {
        
        $user = auth()->user();
        $user_id = $user->user_id;
        $formatted_user_id = str_pad($user_id, 6, '0', STR_PAD_LEFT);

        $lastAppointment = Appointment::latest('appointment_id')->first();

        // หาค่า appointment_id ล่าสุด
        $lastAppointmentId = $lastAppointment->appointment_id ?? '000';

        // สร้าง appointment_id ใหม่
        $newAppointmentId = str_pad((int)$lastAppointmentId + 1, 20, '0', STR_PAD_LEFT);
        $pet_id = $request->input('pet_selection'); // เปลี่ยนจาก 'pet_id' เป็น 'pet_selection'
        $appointment_date = $request->input('appointment_date');
        $appointment_time = $request->input('appointment_time');
        $reason = $request->input('reason');



        $userPets = Pet::where('user_id', $user->user_id)->get();

        $user_pet = null; // สร้างตัวแปรเพื่อเก็บชื่อสัตว์เลี้ยงที่ตรงกับ $pet_id

        // ตรวจสอบ $pet_id และดึงชื่อสัตว์เลี้ยง
        foreach ($userPets as $pet) {
            if ($pet->pet_id === $pet_id) {
                $user_pet = $pet->pet_name;
                break; // หากเจอ $pet_id ที่ตรงกัน ให้หยุดลูป
            }
        }
        // บันทึกข้อมูลลงในตาราง Appointment
        $inserted = Appointment::create([
            'appointment_id' => $newAppointmentId,
            'pet_id' => $pet_id,

            'appointment_date' => $appointment_date,
            'appointment_time' =>  $appointment_time,
            'reason' => $reason,
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
        'petname' => $user_pet,
        'date_appoint' =>  $appointment_date,
        'time_appoint' => $appointment_time,
        'image' => $file = $request->file('image'),
        'topic' => 'Appointment',
        'firstname' =>  $user_first,
        'lastname' =>  $user_last,
        'reason' =>   $reason,
       ];

       $to = $email = auth()->user()->email;

       Mail::to($to) ->send(new \App\Mail\NotificationMail($data));

       NotifyRecord::create([
        'notify_id' => $newnotify_id,
        'topic' => 'Appointment',
        'date' =>   $datestringGMTPlus7,
        'time' => $timestringGMTPlus7,
        'recipient_id' => $formatted_user_id,
    ]);

        return redirect()->route('appointment.index');

    }

}
