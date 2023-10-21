<?php

namespace App\Models;

use App\Enums\RelationshipEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'patient_id',
        'relationship',
    ];

    protected $casts = [
        'relationship' => RelationshipEnum::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function getRelationshipLabelAttribute(){
        return RelationshipEnum::from($this->attributes['relationship'])->label;
    }

}
