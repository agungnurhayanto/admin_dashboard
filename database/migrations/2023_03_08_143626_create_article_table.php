<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel', function (Blueprint $table) {
            $table->id();
            $table->dateTime('artikel_tanggal');
            $table->string('artikel_judul');
            $table->string('artikel_slug')->unique();
            $table->longText('artikel_konten');
            $table->string('artikel_sampul')->nullable();
            $table->integer('artikel_author');
            $table->integer('artikel_kategori');
            $table->enum('artikel_status', ['publish', 'draft']);
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
