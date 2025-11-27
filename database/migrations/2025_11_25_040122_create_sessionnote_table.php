<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sessionnote', function (Blueprint $table) {
            $table->bigIncrements('note_id');

            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('professional_id');

            $table->text('isi_catatan')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('session_id')
                ->references('session_id')
                ->on('session')       // pastikan tabel sessions sudah ada
                ->onDelete('cascade');

            $table->foreign('professional_id')
                ->references('id')
                ->on('professional_profile')  // pastikan tabel ini sudah ada
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessionnote');
    }
};
