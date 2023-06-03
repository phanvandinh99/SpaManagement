<?php

namespace App\Models;

use App\Shared\Constants\TableName;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = TableName::ORDER;

    protected $fillable = [
        'id',
        'user_id',
        'datetime',
        'total_money',
        'payment_status',

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
