<?php

use App\Enums\DosageEnum;
use App\Enums\ReminderRepetitionEnum;
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
        Schema::create('medication_reminders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('medication_id');
            $table->enum('dosage', DosageEnum::toValues())->default(DosageEnum::Half());
            $table->time('time_reminder');
            $table->enum('repititon', ReminderRepetitionEnum::toValues())->default(ReminderRepetitionEnum::Once());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medication_reminders');
    }
};
