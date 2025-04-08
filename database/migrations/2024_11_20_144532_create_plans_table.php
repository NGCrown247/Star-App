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
        Schema::create('plans', function (Blueprint $table) {
          $table->id();
          $table->string('image')->nullable();
          $table->string('plan_title');
          $table->decimal('plan_price', 10,2);
          $table->string('plan_earn_daily');
          $table->string('Benefit_header');
          $table->string('play_video');
          $table->string('answer_quiz');
          $table->string('play_music');
          $table->string('countDown_engagement');
          $table->string('countDown_engagement_warning');
            // $table->integer('task_point');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
