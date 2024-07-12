<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $fillable = [
        'id',
        'name',
        'contact_no',
        'email',
        'city_id',
        'area_id'
    ];
    use HasFactory;
}
