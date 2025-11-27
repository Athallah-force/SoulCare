<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('review', function (Blueprint $table) {
            $table->bigIncrements('review_id');

            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('client_profile_id');

            $table->integer('rating')->default(0); // 1–5 rating
            $table->text('komentar_ulasan')->nullable();

            $table->timestamps();

            // Foreign keys
            $table->foreign('session_id')
                ->references('id')
                ->on('session')
                ->onDelete('cascade');

            $table->foreign('client_profile_id')
                ->references('id')
                ->on('client_profile')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('review');
    }
};
