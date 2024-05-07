<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cadences', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->integer('cadence');
            $table->string('unité');
            $table->foreignId('atelier_id')->constrained('ateliers')->onDelete('cascade');
            $table->foreignId('ligne_id')->constrained('lignes')->onDelete('cascade');
            $table->foreignId('article_id')->constrained('articles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cadences');
    }
};
