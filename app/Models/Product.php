<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'price',
        'quantity',
        'gender',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class,'category');
    }

    public function images()
    {
        return $this->hasMany(Image::class,'product_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'carts');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class,'product_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class,'product_order','product_id','order_id')->withPivot('quantity');
    }
}
