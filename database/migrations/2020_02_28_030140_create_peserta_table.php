<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nomor_id")->unique();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string("kategori");
            $table->string("tempat_lahir");
            $table->date("tanggal_lahir");
            $table->text("alamat");
            $table->string("nomor_hp");
            $table->string("foto")->nullable();
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
        Schema::table('peserta', function (Blueprint $table) {
            $table->dropColumn("nomor_id");
            $table->dropColumn("nama");
            $table->dropColumn("jenis_kelamin");
            $table->dropColumn("kategori");
            $table->dropColumn("tempat_lahir");
            $table->dropColumn("tanggal_lahir");
            $table->dropColumn("alamat");
            $table->dropColumn("nomor_hp");
            $table->dropColumn("foto");
        });
    }
}
