<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('film_length');
            $table->date('release_date');
            $table->string('country');
            $table->unsignedBigInteger('id_film_type');
            $table->foreign('id_film_type')->references('id')->on('film_types');
            $table->double('price');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::statement("ALTER TABLE films ADD image MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
