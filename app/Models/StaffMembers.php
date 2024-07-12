<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffMembers extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'username', 'email', 'contact_no', 'role_id'];

    public function getRole(){
        return $this->belongsTo(Roles::class, 'role_id', 'id');
    }
}
