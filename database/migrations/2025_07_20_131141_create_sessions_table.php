<?php

use App\Models\Counselor;
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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Counselor::class)->onDelete('cascade');
            $table->string('email');
            $table->date('date');
            $table->time('from');
            $table->time('to');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
