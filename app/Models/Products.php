<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    protected $fillable = [
        'id',
        'name', 
        'category_id', 
        'unit_price',
        'supplier_id',
        'brand_id',
        'stock_quantity'
    ];
    // use SoftDeletes;
    
    public function getCategory()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

    public function getSupplier()
    {
        return $this->belongsTo(Suppliers::class, 'supplier_id', 'id');
    }

    public function getBrand()
    {
        return $this->belongsTo(Brands::class, 'brand_id', 'id');
    }



    use HasFactory;
}
