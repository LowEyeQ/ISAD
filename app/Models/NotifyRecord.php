<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifyRecord extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'Notify_Record';
    protected $primaryKey = 'notify_id';

    protected $fillable = [
        'notify_id',
        'topic',
        'date',
        'time',
        'recipient_id',
    ];
}
