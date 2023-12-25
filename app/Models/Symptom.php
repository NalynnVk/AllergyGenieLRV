<?php

namespace App\Models;

use App\Enums\SymptomSeverityEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
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

    public function getSeverityLabelAttribute(){
        return SymptomSeverityEnum::from($this->attributes['severity'])->label;
    }
}
