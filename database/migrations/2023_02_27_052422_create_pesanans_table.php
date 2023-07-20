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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pesanan')->unique()->nullable();
            $table->string('nama_pemesan')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('alamat')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('market_shoe_id')->nullable();
            $table->string('harga_total')->default(0)->nullable();
            $table->string('status_pesanan')->default('pending')->nullable();
            $table->string('dibatalkan')->nullable();
            $table->boolean('pesanan_diantar')->default(0)->nullable();
            $table->boolean('dinilai')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
