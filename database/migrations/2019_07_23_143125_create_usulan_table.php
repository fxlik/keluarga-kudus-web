<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsulanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usulan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('organisasi_id')->index();
            $table->unsignedInteger('seksi_id')->index();
            $table->unsignedInteger('wilayah_id')->index();
            $table->unsignedInteger('user_id')->index();            
            $table->string('perihal');
            $table->text('detail');
            $table->string('file')->nullable();
            $table->integer('status')->default(0);
            $table->text('tanggapan')->nullable();
            $table->timestamps();

            $table->foreign('organisasi_id')->references('id')
            ->on('organisasi')->onDelete('cascade');

            $table->foreign('seksi_id')->references('id')
            ->on('seksi')->onDelete('cascade');
           
            $table->foreign('wilayah_id')->references('id')
            ->on('wilayah')->onDelete('cascade');

            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usulan');
    }
}
