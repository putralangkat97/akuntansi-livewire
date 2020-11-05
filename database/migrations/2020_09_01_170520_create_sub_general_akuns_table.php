<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubGeneralAkunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_general_akuns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_sub_ga', 15);
            $table->string('nama_sub_general_akun', 50);
            $table->unsignedBigInteger('general_akun_id');
            $table->timestamps();

            $table->foreign('general_akun_id')->references('id')->on('general_akun')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_general_akuns');
    }
}
