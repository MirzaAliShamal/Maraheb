<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCandidate extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function recruiter() {
        return $this->belongsTo(Recruiter::class);
    }

    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function slots() {
        return $this->hasMany(EventCandidateSlot::class);
    }
}
