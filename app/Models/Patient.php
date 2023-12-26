<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function emergencyContact()
    {
        return $this->hasOne(EmergencyContact::class);
    }

    public function trackings()
    {
        return $this->hasMany(Tracking::class);
    }

    public function medications()
    {
        return $this->hasMany(Medication::class);
    }

    public function dependants()
    {
        return $this->hasMany(Dependant::class);
    }

    public function allergens()
    {
        return $this->belongsToMany(Allergen::class);
    }

    public function allergenPatients()
    {
        return $this->hasMany(AllergenPatient::class);
    }

    //TODO: tambah function medicationReminder
    public function medicationReminders()
    {
        return $this->hasMany(MedicationReminder::class);
    }
}
