<?php

namespace App\Models;

use App\Enums\SymptomSeverityEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'symptom_id',
        'allergen_id',
        // 'item_ingested',
        'severity',
        'notes',
    ];

    protected $casts = [
        'severity' => SymptomSeverityEnum::class,
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function symptom()
    {
        return $this->belongsTo(Symptom::class);
    }

    public function allergen()
    {
        return $this->belongsTo(Allergen::class);
    }

    public function getSeverityLabelAttribute(){
        return SymptomSeverityEnum::from($this->attributes['severity'])->label;
    }
}
