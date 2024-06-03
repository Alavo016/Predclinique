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
        Schema::table('consultations', function (Blueprint $table) {
            $table->float('temperature')->nullable();
            $table->float('tension')->nullable();
            $table->float('imc')->nullable();
            $table->float('poids')->nullable();
            $table->float('taille')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->dropColumn('temperature');
            $table->dropColumn('tension');
            $table->dropColumn('imc');
            $table->dropColumn('poids');
            $table->dropColumn('taille');
        });
    }
};
