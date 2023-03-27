<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGasometriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gasometrias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parametros_id');
            $table->foreign('parametros_id')->references('id')->on('parametros_atingidos');
            $table->datetime('dataHoraGaso');
            $table->float('ph');
            $table->float('PaCO2');
            $table->float('PaO2');
            $table->float('BE');
            $table->float('HCO3');
            $table->string('SaO2');
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
        Schema::dropIfExists('gasometrias');
    }
}
