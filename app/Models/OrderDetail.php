<?php

namespace App\Models;

use App\Shared\Constants\TableName;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = TableName::ORDER_DETAIL;

    protected $fillable = [
        'id',
        'product_id',
        'order_id',
        'quantity',
        'into_money',

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
