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
        Schema::create('animals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('specie');
            $table->string('race');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->uuid('owner_id');
            $table->timestamps();

            $table->foreign('owner_id')
            ->references('id')
            ->on('users')
            ->onDelete('restrict');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
