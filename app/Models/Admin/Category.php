<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = [
        'name',
        'description',
        'notes',
        'created_by',
        'picture',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function product(){
        return $this->hasMany('App\Models\Admin\Product', 'categories_id');
    }
}
