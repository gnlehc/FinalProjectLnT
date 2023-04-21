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
}
