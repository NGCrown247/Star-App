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
        Schema::create('email_verifications', function (Blueprint $table) {
            $table->id();
            $table->string('token')->nullable();
            $table->string('email');
            $table->string('transaction_ref')->nullable();
            $table->unsignedBigInteger('plan_id');
            $table->boolean('is_verified')->nullable()->default(false);
            $table->timestamp('token_expired_at');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_verifications');
    }
};
