<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideocallAppoint extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'VideoCall_Appointment'; // ระบุชื่อตารางในฐานข้อมูล
    protected $primaryKey = 'videocall_id'; // ระบุ primary key ของตาราง
    public $incrementing = true;
    protected $fillable = [
        'videocall_id', // Add 'appointment_id' to the fillable array
        'veterinary_id',
        'user_id',
        'time_start',
        'reason',
        'time_end',
        'date',
    ];
}
