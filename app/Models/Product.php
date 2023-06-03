<?php

namespace App\Models;

use App\Shared\Constants\TableName;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = TableName::PRODUCT;

    protected $fillable = [
        'id',
        'type_id',
        'img',
        'name',
        'description',
        'price',
        'total_amount',

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
