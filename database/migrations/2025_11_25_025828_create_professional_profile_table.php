<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('professional_profile', function (Blueprint $table) {
            $table->bigIncrements('professional_profile_id');

            // FK ke tabel users
            $table->unsignedBigInteger('user_id');

            // FK ke specialization
            $table->unsignedBigInteger('spesialisasi_id')->nullable();

            $table->string('lisensi_praktik')->nullable();
            $table->integer('tarif_sesi')->default(0);
            $table->text('deskripsi_profil')->nullable();
            $table->tinyInteger('status_aktif')->default(false);

            $table->timestamps();

            // Foreign Keys
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('spesialisasi_id')
                ->references('specialization_id')->on('specialization')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('professional_profile');
    }
};
