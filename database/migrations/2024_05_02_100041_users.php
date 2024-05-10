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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('prenom');
            $table->string('pseudo');
            $table->string('email')->unique();
            $table->string('telephone');
            $table->string('sexe');
            $table->string('nationalite');
            $table->string('ville');
            $table->string('photo');
            $table->string('etat_civile');
            $table->string('allergie');
            $table->string('status');
            $table->date('date_naissance'); // Ajout de la colonne date_naissance

            $table->unsignedBigInteger('id_role');
            $table->foreign('id_role')->references('id')->on('roles')->onDelete('cascade'); // Correction de la référence à la table roles

            $table->unsignedBigInteger('specialite_id')->nullable(); // Ajout de la clé étrangère specialite_id
            $table->foreign('specialite_id')->references('id')->on('specialites')->onDelete('cascade');

            $table->unsignedBigInteger('dossier_medical_id')->nullable(); // Ajout de la clé étrangère dossier_medical_id
            $table->foreign('dossier_medical_id')->references('id')->on('dossier_medicals')->onDelete('cascade');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
