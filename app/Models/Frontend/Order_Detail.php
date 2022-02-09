<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;
    protected $table = "order_details";
    protected $fillable = [
        'order_id',
        'product_id',
        'created_at',
        'updated_at',
    ];
}
