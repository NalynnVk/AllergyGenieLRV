<?php

namespace App\Models;

use App\Enums\DosageEnum;
use App\Enums\ReminderRepetitionEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicationReminder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'medication_id',
        'dosage',
        'time_reminder',
        'repititon',
    ];

    protected $casts = [
        'dosage' => DosageEnum::class,
        'repititon' => ReminderRepetitionEnum::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function medication()
    {
        return $this->belongsTo(Medication::class);
    }

    public function getDosageLabelAttribute(){
        return DosageEnum::from($this->attributes['dosage'])->label;
    }

    public function getRepititonLabelAttribute(){
        return ReminderRepetitionEnum::from($this->attributes['repititon'])->label;
    }
}
