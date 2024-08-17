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
        Schema::create('pendingform', function (Blueprint $table) {
            $table->id();
            $table->string('hashId')->nullable();
            $table->string('jobtitle')->nullable();
            $table->string('companyname')->nullable();
            $table->string('jobaddress')->nullable();
            $table->string('jobtype')->nullable();
            $table->string('salary')->nullable();
            $table->string('role')->nullable();
            $table->string('niche')->nullable();
            $table->string('reviews')->nullable();
            $table->longText('about')->nullable();
            $table->longText('aboutRole')->nullable();
            $table->longText('requirements')->nullable();
            $table->longText('benefits')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendingform');
    }
};
