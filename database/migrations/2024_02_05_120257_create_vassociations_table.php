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
        Schema::create('vassociations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('p_id');
            $table->unsignedBigInteger('v_id');
            $table->string('state, 50');
            $table->string('district, 50');
            $table->string('remark', 255)->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();

            $table->foreign('p_id')->references('id')->on('projects');
            $table->foreign('v_id')->references('id')->on('vendors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vassociations');
    }
};
