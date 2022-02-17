<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        'name',
        'description',
        'thumbnail',
        'categories_id',
        'quantity',
        'unit_price',
        'selling_price',
        'notes',
        'status',
        'created_by',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Admin\Category', 'categories_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\Admin\User','carts', 'product_id', 'user_id');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Frontend\Order', 'order_details','product_id', 'order_id');
    }
}
