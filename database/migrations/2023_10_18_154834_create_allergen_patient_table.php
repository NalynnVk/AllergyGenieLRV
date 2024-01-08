<?php

use App\Enums\SymptomSeverityEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('allergen_patient', function (Blueprint $table) {
            $table->foreignId('allergen_id');
            $table->foreignId('patient_id');
            $table->enum('severity', SymptomSeverityEnum::toValues())->default(SymptomSeverityEnum::Mild());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allergen_patient');
    }
};
