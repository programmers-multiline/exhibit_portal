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
    Schema::create('attendees_list', function (Blueprint $table) {
        $table->id();

        $table->string('exhibit_name')->nullable();

        $table->foreignId('company_id')
              ->nullable()
              ->constrained('company_list')
              ->onDelete('set null');

        $table->string('year_attended')->nullable();
        $table->string('lead_status')->nullable();
        $table->string('conversion_status')->nullable();
        $table->string('encoded_by')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendees_list');
    }
};
