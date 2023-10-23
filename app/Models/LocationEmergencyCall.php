<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationEmergencyCall extends Model
{
    use HasFactory;

    protected $table = 'Location_Emergencycalls'; // ระบุชื่อตาราง
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'id',
        'first_name',
        'last_name',
        'user_id',
        'location',
        'description',
        'additional_image',
        'created_at'
    ];

    // สร้างความสัมพันธ์ระหว่าง EmergencyCall กับ User (ถ้ามี)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function relatedEmergencyCall()
    {
        return $this->hasOne(EmergencyCall::class, 'name', 'name');
    }
}
