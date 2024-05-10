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
        Schema::create('fournitures', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->integer('quantite');
            $table->integer('seuil_minimum');
            $table->float('prix_unitaire');
            $table->unsignedBigInteger('inf_id');
            $table->foreign('inf_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('type_fourniture_id');
            $table->foreign('type_fourniture_id')->references('id')->on('type_fourniture')->onDelete('cascade');
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
