<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'avatar',
        'first_name',
        'last_name',
        'email',
        'mobile_no',
        'password',
        'age',
        'dob',
        'gender',
        'address',
        'country',
        'city',
        'zip_code',
        'experience_min',
        'experience_max',
        'specalise',
        'intro_video',
        'cv',
        'profile_status',
        'visibility_status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'specalise' => 'array'
    ];

    public function getNameAttribute() {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function getProfileAttribute()
    {
        if ($this->avatar == null) {
            return "https://ui-avatars.com/api/?name={$this->name}";
        } else {
            return Storage::disk('public')->url($this->avatar);
        }
    }

    public function getExperienceAttribute() {
        return $this->experience_min . ' - ' . $this->experience_max . ' years';
    }
}
