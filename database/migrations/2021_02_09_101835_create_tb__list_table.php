<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_list', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('judul', 100);
            $table->bigInteger('kategori_id');
            $table->string('waktu', 100);
            $table->string('status_list', 100);
            $table->string('tanggal_list',200);
            $table->text('deskripsi');
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
        Schema::dropIfExists('tb_list');
    }
}
