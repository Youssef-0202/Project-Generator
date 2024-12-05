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
    Schema::create('user_templates', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // Match the custom primary key in 'users' table
        $table->unsignedBigInteger('template_id'); // Match the custom primary key in 'templates' table
        $table->json('components_data');
        $table->timestamps();

        // Explicitly reference custom primary keys
        $table->foreign('user_id')->references('userId')->on('users')->onDelete('cascade');
        $table->foreign('template_id')->references('templateId')->on('templates')->onDelete('cascade');
    });
}

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_templates');
    }
};