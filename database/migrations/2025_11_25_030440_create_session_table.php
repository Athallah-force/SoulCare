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
        Schema::create('session', function (Blueprint $table) {
    $table->id('session_id');

    $table->unsignedBigInteger('client_id');
    $table->unsignedBigInteger('professional_id');
    $table->unsignedBigInteger('slot_id')->nullable();

    $table->timestamp('waktu_mulai')->nullable();
    $table->timestamp('waktu_akhir')->nullable();
    $table->string('jenis_sesi')->nullable();
    $table->string('status_sesi')->default('pending');
    $table->string('link_sesi')->nullable();

    $table->timestamps();

    $table->foreign('client_id')->references('client_profile_id')->on('client_profile')->onDelete('cascade');
    $table->foreign('professional_id')->references('professional_profile_id')->on('professional_profile')->onDelete('cascade');
    $table->foreign('slot_id')->references('slot_id')->on('availability_slot')->onDelete('set null');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session');
    }
};
