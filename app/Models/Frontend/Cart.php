<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = "carts";
    protected $fillable = [
        'user_id',
        'product_id',
        'created_at',
        'updated_at',

    ];

    public function product(){
        return $this->belongsTo('App\Models\Admin\Product', 'product_id');
    }

    
}
