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
        Schema::table('specialites', function (Blueprint $table) {
            // Ajouter la colonne 'prix'
            $table->decimal('prix', 8, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('specialites', function (Blueprint $table) {
            // Supprimer la colonne 'prix' si elle existe
            $table->dropColumn('prix');
        });
    }
};
