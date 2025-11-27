<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->bigIncrements('transaction_id');

            $table->unsignedBigInteger('session_id');

            $table->decimal('jumlah_pembayaran', 12, 2)->nullable();
            $table->string('status_pembayaran')->default('pending');
            $table->string('metode_pembayaran')->nullable();
            $table->timestamp('tanggal_transaksi')->nullable();

            $table->timestamps();

            $table->foreign('session_id')
                ->references('session_id')
                ->on('session')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
