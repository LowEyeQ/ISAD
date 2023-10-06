<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $table = 'Pet';
    protected $primaryKey = 'pet_id';
    protected $keyType = 'string';
    public $incrementing = true;

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function mediExams(){
        return $this->hasMany(MediExam::class, 'pet_id', 'pet_id');
    }

}
