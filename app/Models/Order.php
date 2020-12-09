<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'email',
        'phone',
        'postal_code',
        'address',
        'payment',
        'total_price',
    ];


    public function products()
    {
        return $this->belongsToMany(Product::class,'product_order','order_id','product_id')->withPivot('quantity');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
