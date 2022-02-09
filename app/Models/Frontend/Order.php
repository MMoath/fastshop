<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = [
        'price',
        'address',
        'payment_method',
        'notes',
        'user_id',
        'status',
        'created_at',
        'updated_at',
    ];
}
