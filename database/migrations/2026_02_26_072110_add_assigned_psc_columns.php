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
           Schema::table('participants', function (Blueprint $table) {
              $table->string('assigned_psc')->nullable()->after('updated_at');
              $table->timestamp('assigned_date')->nullable()->after('assigned_psc');
             
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
         Schema::table('participants', function (Blueprint $table) {

            $table->dropColumn(['assigned_psc', 'assigned_date']);

        });
    }
};
