<?php

namespace App\Models;

use App\Enums\SymptomSeverityEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllergenPatient extends Model
{
    use HasFactory;
    protected $fillable = [
        'allergen_id',
        'patient_id',
        'severity',
    ];

    protected $casts = [
        'severity' => SymptomSeverityEnum::class,
    ];

    protected $table = 'allergen_patient';
    protected $primaryKey = 'allergen_id';
    public $timestamps = false;

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function allergen()
    {
        return $this->belongsTo(Allergen::class);
    }

    public function getSeverityLabelAttribute()
    {
        return SymptomSeverityEnum::from($this->attributes['severity'])->label;
    }
}
