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
        schema::create('pengguna', function (Blueprint $table){
            $table->id();
            $table->string('pengguna_nama')->nullable();
            $table->string('pengguna_email')->nullable();
            $table->string('pengguna_username')->nullable();
            $table->string('pengguna_password')->nullable();
            $table->enum('pengguna_level', ['admin', 'penulis'])->nullable();
            $table->integer('pengguna_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
