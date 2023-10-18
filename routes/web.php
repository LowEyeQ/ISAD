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
use App\Http\Controllers\VideoAppointController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\AppointmentController;
use Barryvdh\DomPDF\Facade as PDFFacade;
use App\Http\Controllers\EmergencyController;


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




Route::get('/user-location', [LocationController::class,'showLocation']);

Route::get('/',[MainController::class,'index']);



Route::get('/main',[MainController::class,'index'])->name('main');

Route::get('/paper', [DocController::class, 'createPDF']);



Route::get('dashboard', [DashboardController::class, 'dashboard'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/certificate',[DocController::class,'doc'])->name('certificate');
    Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment.index');
    Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment');
    Route::get('/videocall', [VideoAppointController::class, 'index'])->name('videocall.index');
    Route::post('/videocall', [VideoAppointController::class, 'store'])->name('videocall');
});

Route::get('/sendmail', [MailController::class, 'notification']);

Route::post('/export_pdf', [PdfController::class, 'export_pdf'])->name('export_pdf');

Route::get('/appointments-chart', [ChartController::class, 'index']);

Route::get('/generate-pdf/{exam_id}', [DocController::class, 'createPDF'])->name('generate-pdf') ;

Route::get('/appointments-chart', [ChartController::class, 'index']);

Route::get('/payment', function () {
    return view('Payment');

});
Route::get('/EmergencyCall', [EmergencyController::class, 'index'])->name('emergency-call') ;

Route::post('/payment', [PaymentController::class, 'processPayment'])->name('payment.payNow');

require __DIR__.'/auth.php';

