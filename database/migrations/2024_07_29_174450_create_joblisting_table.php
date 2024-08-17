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
        Schema::create('joblisting', function (Blueprint $table) {
            $table->id();
            $table->string('hashId');
            $table->string('jobtitle');
            $table->string('companyname');
            $table->string('jobaddress');
            $table->string('jobtype');
            $table->string('salary');
            $table->string('role');
            $table->string('niche');
            $table->string('reviews');
            $table->longText('about');
            $table->longText('aboutRole');
            $table->longText('requirements');
            $table->longText('benefits');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('joblisting');
    }
};
