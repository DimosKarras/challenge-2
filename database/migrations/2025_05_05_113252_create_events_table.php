<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('space_id');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamps();
            /* -------------------------------------- */
            // logic for foreign key
            $table->foreign('space_id')->references('id')->on('spaces')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
