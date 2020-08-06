<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalUmumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal_umums', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal');
            $table->enum('mutasi', ['Debit', 'Kredit']);
            $table->unsignedBigInteger('akun_id');
            $table->unsignedBigInteger('sub_akun_id');
            $table->decimal('nominal', 20, 2);
            $table->text('keterangan');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('akun_id')->references('id')->on('akuns')->onDelete('cascade');
            $table->foreign('sub_akun_id')->references('id')->on('sub_akuns')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurnal_umums');
    }
}
