<?php

namespace App\Models;

use App\Shared\Constants\TableName;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = TableName::INVOICE;

    protected $fillable = [
        'id',
        'appointment_id',
        'payment_date',
        'price',
        'admin_id',

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
