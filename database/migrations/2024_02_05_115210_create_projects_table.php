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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('description', 255);
            $table->unsignedBigInteger('vertical');
            $table->unsignedBigInteger('spoc_id');
            $table->unsignedBigInteger('added_by');
            $table->timestamps();
            $table->foreign('vertical')->references('id')->on('verticals');
            $table->foreign('spoc_id')->references('id')->on('users');
            $table->foreign('added_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
