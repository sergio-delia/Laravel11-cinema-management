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
        Schema::create('orari', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('programmazione_id');
            $table->time('orario');
            $table->timestamps();

            $table->foreign('programmazione_id')->references('id')->on('programmazioni')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orari');
    }
};
