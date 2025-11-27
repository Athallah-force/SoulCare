<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('availability_slot', function (Blueprint $table) {
            $table->bigIncrements('slot_id');

            // FK ke tabel professional_profile
            $table->unsignedBigInteger('professional_id');

            $table->string('hari');              // contoh: Senin, Selasa
            $table->time('jam_mulai');           // misal: 09:00:00
            $table->time('jam_akhir');           // misal: 10:00:00
            $table->boolean('tersedia')->default(true);

            $table->timestamps();

            $table->foreign('professional_id')
                ->references('professional_profile_id')
                ->on('professional_profile')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('availability_slot');
    }
};
