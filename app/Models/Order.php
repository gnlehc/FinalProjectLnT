<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        // 'cart_id',
        'shipping_id',
        'Name',
        'address',
        'posCode',
    ];
    // public function products(){
    //     return $this->belongsTo(products::class);
    // }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function ordered_items(){
        return $this->hasMany(OrderItems::class);
    }

}
