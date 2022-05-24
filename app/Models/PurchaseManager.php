<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PurchaseManager extends Model
{
    use HasFactory, Notifiable;

    protected $guard = 'purchase_manager';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'resturant_manager_id',
        'avatar',
        'first_name',
        'last_name',
        'email',
        'mobile_no',
        'password',
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

    public function resturantManager() {
        return $this->belongsTo(ResturantManager::class);
    }
}
