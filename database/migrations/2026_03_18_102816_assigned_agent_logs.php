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
          Schema::create('assigned_agent_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('old_psc_emp_id')->nullable();
            $table->string('old_psc_name')->nullable();
            $table->string('new_psc_emp_id');
            $table->string('new_psc_name');
            $table->string('changed_by'); // emp_id ng nag assign
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('assigned_agent_logs');
    }
};
