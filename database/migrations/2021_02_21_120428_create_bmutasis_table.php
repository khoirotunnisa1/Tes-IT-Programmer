<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBmutasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bmutasis', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('kode_id')->unsigned();
            $table->foreign('kode_id')->references('id')->on('datas')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tgl');
            $table->string('nobukti',100);
             $table->string('indikator',100);
         
              $table->string('quantity',100);
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
        //
    }
}
