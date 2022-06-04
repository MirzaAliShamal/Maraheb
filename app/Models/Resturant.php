<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resturant extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function resturantManager() {
        return $this->belongsTo(ResturantManager::class);
    }

    public function hotel() {
        return $this->belongsTo(Hotel::class);
    }

    public function resturantDepartments() {
        return $this->hasMany(ResturantDepartment::class);
    }
}
