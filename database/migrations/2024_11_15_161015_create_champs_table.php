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
        Schema::create('champs', function (Blueprint $table) {
            $table->id('fieldId');
            $table->string('typeChamp');
            $table->string('etiquette');
            $table->boolean('obligatoire');
            $table->string('defaultVal');
            $table->timestamps();
            $table->unsignedBigInteger('componentId');
            $table->foreign('componentId')
                  ->references('componentId')
                  ->on('composants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('champs');
    }
};
