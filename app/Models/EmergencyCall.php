<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyCall extends Model
{
    use HasFactory;

    protected $table = 'emergencycalls'; // ระบุชื่อตาราง
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'user_id',
        'latitude',
        'longitude',
        'additional_image',
        'created_at',
    ];

    // สร้างความสัมพันธ์ระหว่าง EmergencyCall กับ User (ถ้ามี)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
