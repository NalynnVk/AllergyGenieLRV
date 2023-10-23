<?php

namespace App\Models;

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
}
