<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getHotelLogoAttribute()
    {
        if ($this->logo == null) {
            return asset('placeholder.jpg');
        } else {
            return Storage::disk('public')->url($this->logo);
        }
    }

    public function resturants() {
        return $this->hasMany(Resturant::class);
    }
}
