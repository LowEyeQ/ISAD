<?php

namespace App\Http\Controllers;

use App\Models\MediExam;
use App\Models\Pet;
use App\Models\Veterinary;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Auth;
use \DateTime;

class DocController extends Controller
{
    function doc(){
        $user = Auth::user();
        $userPets = $user->pets->pluck('pet_id')->toArray(); // ดึงรหัสของ Pets ของ User ทั้งหมดและเก็บไว้ในรูปของ Array ดึงข้อมูลเฉพาะคอลัมน์เดียวจากตาราง
        $certificates = MediExam::whereIn('pet_id', $userPets)
        ->with('vet') // โหลดข้อมูลสัตวแพทย์
        ->get();
        return view('Services.certificate', compact('certificates'));
    }

    function createPDF(string $exam_id) {

        $MediExam;
        $Pet;
        $Vet = Veterinary::all();

        foreach (MediExam::all() as $m) {
            if ($m->exam_id == $exam_id) {
                $MediExam =$m;
                break;
            }
        }

        foreach (Pet::all() as $p) {
            if ($MediExam->pet_id == $p->pet_id) {
                $Pet =$p;
                break;
            }
        }

        foreach (Veterinary::all() as $v) {
            if ($MediExam->veterinary_id == $v->veterinary_id) {
                $Vet =$v;
                break;
            }
        }

        $mediExamDate = new DateTime($MediExam->date);
        $date_of_birth = new DateTime($Pet->date_of_birth);

        $interval = $mediExamDate->diff($date_of_birth);
        $age_in_days = $interval->days;
        $age_in_months = $age_in_days / 30.4;  // ประมาณจำนวนวันในเดือนเฉลี่ย


        $html = view('pdf_template', compact("Pet", "MediExam", "Vet", "age_in_months"));
        $pdf = PDF::loadHTML($html); // Load your Blade Template


        return $pdf->stream(); // Stream the PDF to the browser for viewing or download
    }

}
