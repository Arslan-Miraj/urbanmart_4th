<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cities;

class Suppliers extends Model
{
    use HasFactory;

    protected $fillable = [ 'id','name','phone_no', 'email', 'city_id' ];

    public function getCity()
    {
        return $this->belongsTo(Cities::class, 'city_id', 'id');
    }
}
