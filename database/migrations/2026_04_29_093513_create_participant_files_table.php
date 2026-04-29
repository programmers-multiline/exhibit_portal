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
        Schema::create('participant_files', function (Blueprint $table) {
            $table->id();

    $table->unsignedBigInteger('participant_id');
    $table->string('file_path');
    $table->string('file_name')->nullable();
    $table->string('file_type')->nullable();

    $table->unsignedBigInteger('uploaded_by');
    $table->timestamp('uploaded_at')->nullable();

    $table->timestamps();

    $table->foreign('participant_id')
        ->references('id')
        ->on('participants')
        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participant_files');
    }
};
