<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyResturantManager extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function resturantManager() {
        return $this->belongsTo(ResturantManager::class);
    }
}
