<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\RegistrationStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'date_of_birth',
        'phone_number',
        'password',
        'profile_photo_path',
        'registration_status',
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
        'password' => 'hashed',
        'registration_status' => RegistrationStatusEnum::class,
    ];

    public function patient()
    {
        return $this->hasOne(Patient::class);
    }

    public function dependants()
    {
        return $this->hasMany(Dependant::class);
    }

    public function getRegistrationStatusLabelAttribute(){
        return RegistrationStatusEnum::from($this->attributes['registration_status'])->label;
    }
}
