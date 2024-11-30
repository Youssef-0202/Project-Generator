<?php

use App\Models\Template;
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
        Schema::create('composants', function (Blueprint $table) {
            $table->id('componentId');
            $table->unsignedBigInteger('templateId');
            $table->string('name');
            $table->text('contenu')->nullable();
            $table->timestamps();
            $table->foreign('templateId')->references('templateId')->on('templates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('composants');
    }
};
