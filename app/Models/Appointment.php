<?php

namespace App\Models;

use App\Shared\Constants\TableName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = TableName::APPOINTMENT;

    protected $fillable = [
        'id',
        'user_id',
        'service_id',
        'datetime',
        'note',
        'phone_number',
        'admin_confirm',

        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
