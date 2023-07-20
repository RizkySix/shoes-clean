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
        Schema::create('market_shoes', function (Blueprint $table) {
            $table->id();
            $table->string('slug_id')->unique();
            $table->foreignId('user_id');
            $table->string('pemilik_toko')->nullable();
            $table->string('nama_toko');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('email_toko');
            $table->string('foto_toko')->nullable();
            $table->time('jam_buka')->nullable();
            $table->time('jam_tutup')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whatssapp')->nullable();
            $table->integer('jumlah_star')->default(0)->nullable();
            $table->integer('like_user')->default(0)->nullable();
            $table->string('rating')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('market_shoes');
    }
};
