<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public $timestamps = false;
    protected $table = 'Appointment'; // ระบุชื่อตารางในฐานข้อมูล
    protected $primaryKey = 'appointment_id'; // ระบุ primary key ของตาราง
    public $incrementing = true;
    protected $fillable = [
        'appointment_id', // Add 'appointment_id' to the fillable array
        'pet_id',
        'appointment_date',
        'appointment_time',
        'reason',
    ];
}
