<?php

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
        Schema::create('userprofile', function (Blueprint $table) {
            $table->id();
            $table->string('user_id') -> nullable();
            $table->string('user_email') -> nullable();
            $table->string('user_phone_number') -> nullable();
            $table->string('user_recent_work_experience') -> nullable();
            $table->string('user_education') -> nullable();
            $table->string('user_skill') -> nullable();
            $table->string('user_licenses') -> nullable();
            $table->string('user_certifications') -> nullable();
            $table->string('user_languages') -> nullable();
            $table->string('user_job_titles') -> nullable();
            $table->string('user_minimum_base_pay') -> nullable();
            $table->string('user_job_type') -> nullable();
            $table->string('user_work_schedule') -> nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userprofile');
    }
};
