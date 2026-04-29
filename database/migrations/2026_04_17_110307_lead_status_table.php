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
        //
        Schema::create('lead_agent_status', function (Blueprint $table) {
            $table->id();
            $table->string('lead_status')->nullable();;
            $table->text('description')->nullable();
            $table->string('line_status')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
         Schema::dropIfExists('lead_agent_status');
    }
};
