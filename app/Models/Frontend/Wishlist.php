<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = "wishlists";
    protected $fillable = [
        'user_id',
        'product_id',
        'created_at',
        'updated_at',
    ];
}
