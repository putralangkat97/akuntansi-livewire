<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubAkunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_akun', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_ga', 15);
            $table->string('nama_general_akun', 50);
            $table->unsignedBigInteger('akun_id');
            $table->timestamps();

            $table->foreign('akun_id')->references('id')->on('akuns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_akuns');
    }
}
