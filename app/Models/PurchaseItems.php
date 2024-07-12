<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItems extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'purchase_id', 'product_id', 'quantity', 'price', 'total_price'];

    public function getProduct(){
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
}
