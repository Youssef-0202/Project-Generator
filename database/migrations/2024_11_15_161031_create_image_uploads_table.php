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
        Schema::create('image_uploads', function (Blueprint $table) {
            $table->id('imageId');
            $table->unsignedBigInteger('projectId')->nullable();
            $table->unsignedBigInteger('componentId')->nullable();
            $table->string('imagePath');
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
        Schema::dropIfExists('image_uploads');
    }
};
