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
            $table->text('name');
            $table->text('description');
            $table->integer('rating');
            $table->text('content');
            $table->integer('time');
            $table->datetimes('release');
            $table->text('language');
            $table->text('cinema');
            $table->integer('link');
            $table->text('thumbnail_image');
            $table->text('poster_image');
            $table->text('poster_image');
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
