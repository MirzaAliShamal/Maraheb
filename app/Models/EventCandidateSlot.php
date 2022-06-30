<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EventCandidate;

class EventCandidateSlot extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function eventCandidate() {
        return $this->belongsTo(EventCandidate::class);
    }

    public function candidate() {
        return $this->belongsTo(User::class);
    }
}
