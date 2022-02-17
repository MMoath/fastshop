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

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function products() 
    {
        return $this->belongsToMany('App\Models\Admin\Product', 'order_details', 'order_id', 'product_id');
    }
}
