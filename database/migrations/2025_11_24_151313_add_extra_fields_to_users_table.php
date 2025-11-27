<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('nomor_telepon')->nullable();
        $table->enum('tipe_pengguna', ['Client', 'Professional', 'Admin'])->default('Client');
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['nomor_telepon', 'tipe_pengguna']);
    });
}

};
