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
        Schema::create('assigned_agent', function (Blueprint $table) {
         $table->id();
         $table->string('psc_emp_id')->nullable();
         $table->string('psc_name')->nullable();
         $table->string('company_id')->nullable();
         $table->string('assigned_by')->nullable();
         $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
