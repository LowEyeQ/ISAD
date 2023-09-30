<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\MediExam;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\PdfController;

use App\Http\Controllers\AppointmentController;
use Barryvdh\DomPDF\Facade as PDFFacade;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/certificate',[DocController::class,'doc']);


Route::get('/user-location', [UserController::class,'showLocation']);

Route::get('/',[MainController::class,'index']);



Route::get('/main',[MainController::class,'index']);

Route::get('/paper', [DocController::class, 'doc']);

// Route::get('/', function () { //เอาของ laravel ออก
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    $users= User::all();
    $MediExam=MediExam::all();
    return view('dashboard', compact("MediExam"));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/sendmail', [MailController::class, 'notification']);

Route::get('/calendar', [AppointmentController::class, 'index']);

Route::post('/', [AppointmentController::class, 'store']);

Route::post('/export_pdf', [PdfController::class, 'export_pdf'])->name('export_pdf');


Route::get('/generate-pdf', function () {
    $pdf = PDF::loadView('pdf_template'); // Load your Blade Template
    
    return $pdf->stream(); // Stream the PDF to the browser for viewing or download
});
// Route::get('/fonts/NotoSerifThai-VariableFont_wdth,wght.ttf', function ($filename) {
//     $font = Storage::disk('local')->get("fonts/$filename");
//     return response($font, 200)->header('Content-Type', 'font/ttf');
// })->where('filename', '.*\.ttf');
require __DIR__.'/auth.php';

