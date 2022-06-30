<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function resturantDepartments() {
        return $this->hasMany(ResturantDepartment::class);
    }

    public function userDepartments() {
        return $this->hasMany(UserDepartment::class);
    }
}
