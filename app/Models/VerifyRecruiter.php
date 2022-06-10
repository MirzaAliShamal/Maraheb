<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyRecruiter extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function recruiter() {
        return $this->belongsTo(Recruiter::class);
    }
}
