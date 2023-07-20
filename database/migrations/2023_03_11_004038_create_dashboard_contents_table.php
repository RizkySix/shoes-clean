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
        Schema::create('dashboard_contents', function (Blueprint $table) {
            $table->id();
            $table->string('judul1')->nullable();
            $table->text('deskripsi1')->nullable();
            $table->string('foto_konten1')->nullable();

            $table->string('judul2')->nullable();
            $table->text('deskripsi2')->nullable();
            $table->string('foto_konten2')->nullable();

            $table->string('judul3')->nullable();
            $table->text('deskripsi3')->nullable();
            $table->string('foto_konten3')->nullable();

            $table->string('judul4')->nullable();
            $table->text('deskripsi4')->nullable();
            $table->string('foto_konten4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard_contents');
    }
};
