<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'username',
        'prodName',
        'quantity',
        'price',
        'product_id',
    ];
    public function products(){
        return $this->belongsTo(products::class, 'product_id', 'id');
    }
}
