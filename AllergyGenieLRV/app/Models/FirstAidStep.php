<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirstAidStep extends Model
{
    use HasFactory;

    protected $fillable = ['step'];

    public function symptoms()
    {
        return $this->belongsToMany(Symptom::class);
    }
}
