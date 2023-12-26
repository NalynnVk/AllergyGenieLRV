<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function patients()
    {
        return $this->belongsToMany(Patient::class);
    }

    public function symptom()
    {
        return $this->belongsTo(Symptom::class);
    }

    public function allergenPatients()
    {
        return $this->hasMany(AllergenPatient::class);
    }
}
