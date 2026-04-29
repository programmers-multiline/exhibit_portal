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
        Schema::create('participants', function (Blueprint $table) {
             $table->id();
            $table->string('entry_by');
            $table->string('agent_company')->nullable();
            $table->string('sales_manager')->nullable();
            $table->string('day_num')->nullable();
            $table->string('participant_name')->nullable();
            $table->string('participant_email')->nullable();
            $table->string('participant_company')->nullable();
            $table->string('participant_position')->nullable();
            $table->string('participant_contact')->nullable();
            $table->string('participant_source')->nullable();
            $table->string('participant_address')->nullable();
            $table->string('participant_remarks')->nullable();
            $table->string('participant_photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
