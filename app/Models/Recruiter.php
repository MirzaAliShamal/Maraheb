<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Recruiter extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'recruiter';
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

    public function verifyRecruiter() {
        return $this->hasOne(VerifyRecruiter::class);
    }

    public function resturant() {
        return $this->hasOne(Resturant::class);
    }

    public function purchaseManager() {
        return $this->hasMany(PurchaseManager::class);
    }
}
