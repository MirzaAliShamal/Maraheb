<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResturantDepartment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function resturant() {
        return $this->belongsTo(Resturant::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }
}
