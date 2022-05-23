<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'topLevelDomain' => 'array',
        'callingCodes' => 'array',
        'altSpellings' => 'array',
        'latlng' => 'array',
        'timezones' => 'array',
        'borders' => 'array',
        'flags' => 'json',
        'currencies' => 'array',
        'languages' => 'array',
        'regionalBlocs' => 'array',
        'translations' => 'json',
    ];
}
