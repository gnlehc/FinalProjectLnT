<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];
    public function products(){
        return $this->belongsTo(products::class, 'product_id', 'id');
    }
    public function orders(){
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    public function carts(){
        return $this->belongsTo(Cart::class);
    }
}
