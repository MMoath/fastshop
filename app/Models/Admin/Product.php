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
        'price',
        'description',
        'img',
        'notes',
        'categories_id',
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
}
