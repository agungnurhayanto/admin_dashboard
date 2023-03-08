<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel', function (Blueprint $table) {
            $table->id();
            $table->dateTime('artikel_tanggal')->nullable();
            $table->string('artikel_judul')->nullable();
            $table->string('artikel_slug')->nullable();
            $table->longText('artikel_konten')->nullable();
            $table->string('artikel_sampul')->nullable();
            $table->integer('artikel_author')->nullable();
            $table->integer('artikel_kategori')->nullable();
            $table->enum('artikel_status', ['publish', 'draft'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artikel');
    }
};
