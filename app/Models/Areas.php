<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'city_id',
        'name'
    ];

    public function getCity()
    {
        return $this->belongsTo(Cities::class, 'city_id', 'id');
    }
}
