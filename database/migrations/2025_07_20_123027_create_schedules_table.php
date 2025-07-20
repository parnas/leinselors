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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('schedule_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id')->constrained('schedules')->onDelete('cascade');
            $table->string('weekday');
            $table->time('start');
            $table->time('end');
            $table->timestamps();
            $table->index(['schedule_id', 'weekday', 'start', 'end']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedule_days');
        Schema::dropIfExists('schedules');
    }
};
