<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasingOrders extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'supplier_id', 'purchase_date', 'sub_total', 'discount', 'total_amount', 'payment_method'];

    public function getSupplier(){
        return $this->belongsTo(Suppliers::class, 'supplier_id', 'id');
    }

    public function getPaymentMethod(){
        return $this->belongsTo(PaymentTypes::class, 'payment_method', 'id');
    }

    public function getPurchaseItems(){
        return $this->hasMany(PurchaseItems::class, 'purchase_id', 'id');
    }
}
