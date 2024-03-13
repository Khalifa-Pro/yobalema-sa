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
        Schema::create('louers', function (Blueprint $table) {
            $table->id('id_location');
            $table->string('nom_complet_client');
            $table->string('telephone')->unique();
            $table->string('pointDepart');
            $table->string('pointArrivee');
            $table->string('heureDepart');
            $table->date('dateVoyage');
            $table->unsignedBigInteger('id_vehicule');
            $table->foreign('id_vehicule')->references('id_vehicule')->on('vehicules');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('louers');
    }
};
