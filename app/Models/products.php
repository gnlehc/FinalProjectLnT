<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'prodName',
        'Price',
        'Total',
        'image'
    ];
    public function categories(){
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
    public function cart(){
        return $this->belongsTo(Cart::class);
    }
    public function ordered_items(){
        return $this->belongsTo(OrderItems::class);
    }
    // public function orders(){
    //     return $this->belongsTo(Order::class);
    // }
}
