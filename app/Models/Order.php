<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'cart_id',
        'payment_id',
        'Name',
        'address',
        'posCode'
    ];
    public function cart(){
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}
