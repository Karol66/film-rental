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
        //TO Do zmiana w obrazach z blob na medium blob
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('film_length');
            $table->date('release_date');
            $table->string('country');
            $table->binary('image')->nullable();
            $table->string('type');
            $table->double('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
