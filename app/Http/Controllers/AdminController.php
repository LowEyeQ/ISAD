<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\EmergencyCall;
use App\Models\LocationEmergencyCall;
class AdminController extends Controller
{
    public function index()
    {
        $emergencyCalls = EmergencyCall::all();
        $user = auth()->user();

        $user_id = $user->user_id;
        $formatted_user_id = str_pad($user_id, 6, '0', STR_PAD_LEFT);
        if($formatted_user_id === '000001'){
            return view('admin', compact('emergencyCalls'));
        }else{
            return redirect()->route('login'); // ส่งผู้ใช้กลับไปที่หน้า admin name('login')
        }
    }
    public function index1()
    {
        $emergencyCalls = LocationEmergencyCall::all();
        $user = auth()->user();
        $user_id = $user->user_id;
        $locationCalls = LocationEmergencyCall::all();

        $matches = LocationEmergencyCall::select('name')->get();
        // ดึงข้อมูลจากตาราง EmergencyCall โดยเลือกเฉพาะรายการที่มีชื่อเหมือนกัน
        $formatted_user_id = str_pad($user_id, 6, '0', STR_PAD_LEFT);
        if($formatted_user_id === '000001'){
            return view('admininsertdata', compact('emergencyCalls'));
        }else{
            return redirect()->route('login'); // ส่งผู้ใช้กลับไปที่หน้า admin name('login')
        }

}
    public function store(Request $request){
        LocationEmergencyCall::create($request->all());

        $matches = LocationEmergencyCall::select('name')->get();
        $additionalImages = EmergencyCall::whereIn('name', $matches)->get();

        // อัพเดต LocationEmergencycalls ด้วยข้อมูลจาก emergencycalls
        foreach ($additionalImages as $image) {
            LocationEmergencyCall::where('name', $image->name)
                ->update(['additional_image' => $image->additional_image]);
        }

        return redirect()->route('admin.index1'); // ส่งกลับไปยังหน้าหลักหลังจากบันทึก

    }
}
