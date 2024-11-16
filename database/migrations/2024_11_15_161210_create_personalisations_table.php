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
        Schema::create('personalisations', function (Blueprint $table) {
            $table->id('customizationId');
            $table->unsignedBigInteger('projectId');
            $table->unsignedBigInteger('componentId');
            $table->string('champ');
            $table->text('valeur');
            $table->timestamps();

            // Clés étrangères
            $table->foreign('projectId')->references('projectId')->on('projects')->onDelete('cascade');
            $table->foreign('componentId')->references('componentId')->on('composants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personalisations');
    }
};
