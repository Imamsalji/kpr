<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKprTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpr', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('pangkat');
            $table->string('corps')->nullable();
            $table->biginteger('nrp');
            $table->string('kesatuan');
            $table->biginteger('tahap');
            $table->biginteger('pinjaman');
            $table->biginteger('jk_waktu');
            $table->string('tmt_angsuran');
            $table->biginteger('jml_angs');
            $table->biginteger('angs_ke');
            $table->string('angsuran_masuk')->nullable();
            $table->biginteger('tunggakan');
            $table->biginteger('jml_tunggakan');
            $table->text('keterangan');
            $table->boolean('status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kpr');
    }
}
