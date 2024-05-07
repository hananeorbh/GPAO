<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            
            $table->string('quart');
            $table->string('équipe');
            $table->foreignId('atelier_id')->constrained('ateliers')->onDelete('cascade');
            $table->foreignId('ligne_id')->constrained('lignes')->onDelete('cascade');
            $table->foreignId('article_id')->constrained('articles')->onDelete('cascade');
            $table->string('type');
            $table->boolean('arret');
            $table->string('unité');
            $table->integer('quantité');
            $table->string('lot');
            $table->timestamps();
        });

        // Ajout de l'index unique pour le code
        Schema::table('productions', function (Blueprint $table) {
            $table->string('code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productions');
    }
};