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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('mobile', 10);
            $table->string('email', 50);
            $table->string('state', 50);
            $table->string('district', 50);
            $table->string('address', 255);
            $table->string('remark', 255);
            $table->unsignedBigInteger('added_by');
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('added_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
