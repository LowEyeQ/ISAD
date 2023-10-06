<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediExam extends Model
{
    use HasFactory;

    protected $table = 'Medi_Exam';
    protected $primaryKey = 'exam_id';
    protected $keyType = 'string';
    public $incrementing = true;

    public function pet(){
        return $this->belongsTo(Pet::class, 'pet_id', 'pet_id');
    }

    public function vet(){
        return $this->belongsTo(Veterinary::class, 'veterinary_id', 'veterinary_id');
    }
}
