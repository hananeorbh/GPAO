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
        Schema::create('recettes', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger('article_pf_id'); // Colonne pour l'article PF
            $table->unsignedBigInteger('article_ip_id'); // Colonne pour l'article IP
            $table->foreign('article_pf_id')->references('id')->on('articles');
            $table->foreign('article_ip_id')->references('id')->on('articles');
            $table->decimal('quantite', 10, 2); 
            $table->string('unite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recettes');
    }
};