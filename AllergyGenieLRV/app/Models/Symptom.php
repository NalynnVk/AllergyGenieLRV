<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        // 'description',
        // 'severity',
        // 'tracking_id',
    ];

    public function tracking()
    {
        return $this->belongsTo(Tracking::class);
    }

    public function allergens()
    {
        return $this->belongsToMany(Allergen::class);
    }

    public function firstAidSteps()
    {
        return $this->belongsToMany(FirstAidStep::class);
    }
}
