<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellItems extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'sale_id', 'product_id', 'quantity', 'price', 'total'];

    public function getProduct(){
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
}
