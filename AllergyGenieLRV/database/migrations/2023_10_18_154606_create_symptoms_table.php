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
        Schema::create('symptoms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->ENUM('severity');
            $table->enum('severity', SymptomSeverityEnum::toValues())->default(SymptomSeverityEnum::Mild());
            $table->text('description');
            // $table->unsignedBigInteger('tracking_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('symptoms');
    }
};
