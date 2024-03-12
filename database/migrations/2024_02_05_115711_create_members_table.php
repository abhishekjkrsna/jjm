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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('t_id');     
            $table->unsignedBigInteger('u_id');
            $table->unsignedBigInteger('role');
            $table->unsignedBigInteger('added_by');
            $table->timestamps();

            $table->foreign('t_id')->references('id')->on('teams');
            $table->foreign('u_id')->references('id')->on('users');
            $table->foreign('role')->references('id')->on('roles');
            $table->foreign('added_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
