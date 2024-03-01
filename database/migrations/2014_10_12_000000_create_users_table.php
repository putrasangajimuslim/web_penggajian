<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_karyawan', 11)->nullable();
            $table->string('nama', 30)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->tinyInteger('status')->nullable(); // Mengubah tipe data status menjadi tinyInteger
            $table->string('no_hp', 13)->nullable();
            $table->text('alamat')->nullable(); // Mengubah tipe data alamat menjadi text
            $table->string('jenis_kelamin', 10)->nullable();
            $table->string('password')->nullable(); // Menghapus batasan panjang untuk kolom password
            $table->string('role', 10)->nullable();
            $table->string('id_jabatan', 5)->nullable();
            $table->string('email', 30)->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('karyawan');
    }
}
