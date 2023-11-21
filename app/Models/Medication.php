<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        // 'dosage',
        // 'frequency',
        // 'time',
        // 'is_enabled',
        // 'patient_id',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
