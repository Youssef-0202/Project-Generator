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
        Schema::create('previsualisations', function (Blueprint $table) {
            $table->id('previewId');
            $table->unsignedBigInteger('projectId');
            $table->text('contenu');
            $table->timestamps();

            
            $table->foreign('projectId')->references('projectId')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('previsualisations');
    }
};
