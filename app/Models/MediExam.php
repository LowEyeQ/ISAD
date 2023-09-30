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

    
    
}
