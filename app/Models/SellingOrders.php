<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SellingOrders extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'customer_id', 'sale_date', 'sub_total', 'discount', 'total_amount', 'payment_method'];

    public function getPaymentMethod(){
        return $this->belongsTo(PaymentTypes::class, 'payment_method', 'id');
    }

    public function getCustomer(){
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }

    public function getSaleItems(){
        return $this->hasMany(SellItems::class, 'sale_id', 'id');
    }


}
