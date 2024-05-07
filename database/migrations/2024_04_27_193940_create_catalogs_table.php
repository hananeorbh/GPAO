<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('famille');
            $table->string('sfamille');
            $table->string('class');
            $table->string('impact');
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('catalogs');
    }
};
