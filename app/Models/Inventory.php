<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'warehouse_id', 'product_id', 'stock_quantity'];

    public function getWarehouse()
    {
        return $this->belongsTo(Warehouses::class, 'warehouse_id', 'id');
    }

    public function getProduct()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
}
