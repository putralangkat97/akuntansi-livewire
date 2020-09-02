<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalManualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal_manuals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_invoice', 50);
            $table->date('tanggal');
            $table->enum('mutasi', ['Debit', 'Kredit']);
            $table->text('keterangan');
            $table->unsignedBigInteger('general_akun_id');
            $table->decimal('debit', 15, 2);
            $table->decimal('kredit', 15, 2);
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
        Schema::dropIfExists('jurnal_manuals');
    }
}
