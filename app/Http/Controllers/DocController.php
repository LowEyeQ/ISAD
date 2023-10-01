<?php

namespace App\Http\Controllers;

use App\Models\MediExam;
use App\Models\Pet;
use App\Models\Veterinary;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Auth;


class DocController extends Controller
{

    // function doc(){
    //     if (Auth::check()) {
    //         $user = Auth::user();
    //         $userPets = $user->pets;
    //         $MediExam = MediExam::all();
    //         $Pet = Pet::all();
    //         $Certificate = array();

    //         foreach ($MediExam as $m) { // m = 1 mediexam,p = 1 pet
    //             foreach ($Pet as $p) {
    //                 if ($m->pet_id == $p->pet_id) {
    //                     array_push($Certificate, array(
    //                     "exam_id" => $m->exam_id,
    //                     "pet_id" => $m->pet_id,
    //                     "pet_name" => $p->pet_name,
    //                     "date" => $m->date,
    //                     "veterinary_id" => $m->veterinary_id));
    //                 }
    //             }

    //         }

    //         return view('paper.certificate', compact("Certificate", "Pet", "MediExam"));
    //     }
    // }
    function doc(){
        $user = Auth::user();
        $userPets = $user->pets->pluck('pet_id')->toArray(); // ดึงรหัสของ Pets ของ User ทั้งหมดและเก็บไว้ในรูปของ Array

        // ดึงข้อมูล MediExam ของ Pets ของ User
        $certificates = MediExam::whereIn('pet_id', $userPets)->get();

        return view('paper.certificate', compact('certificates'));
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

        $html = view('pdf_template', compact("Pet", "MediExam", "Vet"));
        $pdf = PDF::loadHTML($html); // Load your Blade Template

        return $pdf->stream(); // Stream the PDF to the browser for viewing or download
    }

}
