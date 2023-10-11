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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->integer('rating');
            $table->string('time');
            $table->dateTime('release');
            $table->string('language');
            $table->string('director');
            $table->string('writer');
            $table->string('genre');
            $table->string('link')->nullable();
            $table->string('thumbnail_image');
            $table->string('poster_image');
            $table->boolean('top_section');
            $table->boolean('coming_soon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
