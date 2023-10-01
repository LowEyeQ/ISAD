<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veterinary extends Model
{
    use HasFactory;

    protected $table = 'Veterinary';
    protected $primaryKey = 'veterinary_id';
    protected $keyType = 'string';
    public $incrementing = true;


}
