<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelolaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelola', function (Blueprint $table) {
            $table->id();
            $table->string('kode_karyawan', 11)->nullable();
            $table->string('bulan', 15)->nullable();
            $table->string('tahun', 4)->nullable();
            $table->string('jml_kehadiran', 3)->nullable();
            $table->string('jml_alfa', 3)->nullable();
            $table->integer('gaji_pokok')->default(0);
            $table->integer('uang_makan')->default(0);
            $table->integer('bonus')->default(0);
            $table->integer('tunjangan_transport')->default(0);
            $table->integer('potongan')->default(0);
            $table->integer('gaji_bersih')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelola');
    }
}
