<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLingkunganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lingkungan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('wilayah_id')->index();
            $table->string('nama');
            $table->timestamps();

            $table->foreign('wilayah_id')->references('id')
            ->on('wilayah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lingkungan');
    }
}
