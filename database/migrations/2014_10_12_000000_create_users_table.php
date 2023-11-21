<?php

use App\Enums\RegistrationStatusEnum;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date_of_birth')->nullable();
            $table->string('phone_number')->unique();
            $table->string('password');
            $table->text('profile_photo_path')->nullable();
            $table->string('email')->unique()->nullable();
            $table->enum('registration_status', RegistrationStatusEnum::toValues())->default(RegistrationStatusEnum::WaitingApproval());
            $table->timestamp('email_verified_at')->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
