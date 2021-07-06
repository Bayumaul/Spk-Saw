<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crip', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kriteria_id')->index()->nullable();
            $table->string('nama_crip');
            $table->integer('nilai_crip');
            $table->timestamps();
            $table->foreign('kriteria_id')
                    ->references('id')
                    ->on('kriteria')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crip');
    }
}
