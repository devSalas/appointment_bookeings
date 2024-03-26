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
        Schema::create('schedule_workers', function (Blueprint $table) {
            $table->id();
            $table->datetime("star_time");
            $table->datetime("avalibility");
            $table->datetime("end_time");
            $table->boolean("duration");
            $table->timestamps();
            $table->enum("day_of_weeks",['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']);
            
            $table->unsignedBigInteger("worker_id");

    
            $table->foreign("worker_id")->references("id")->on("workers");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_workers');
    }
};
