<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'email', 'phone_number', 'city_id', 'address'];

    public function getCity(){
        return $this->belongsTo(Cities::class,'city_id', 'id');
    }
}
