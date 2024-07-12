<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Cities;

class Warehouses extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'capacity', 'city_id', 'area_id', 'address'];

    public function getCity()
    {
        return $this->belongsTo(Cities::class, 'city_id', 'id');
    }

    public function getArea()
    {
        return $this->belongsTo(Areas::class, 'area_id', 'id');
    }
}
