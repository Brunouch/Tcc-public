<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VentPadrao extends Migration
{
    
    public function up()
    {
        Schema::create('ventPadrao', function (Blueprint $table) {
            $table->id();
            $table->string('modo');
            $table->string('ciclagem');
            $table->integer('fio2');
            $table->integer('peep');
            $table->integer('fr_vm');
            $table->string('ie');
            $table->string('templnsp')->nullable();
            $table->integer('pc')->nullable();
            $table->integer('ps')->nullable();
            $table->string('pav')->nullable();
            $table->integer('volControl')->nullable();
            $table->string('fluxOnda')->nullable();
            $table->string('sensibilidadeInspi')->nullable();
            $table->string('sensibilidadeExp')->nullable();
            $table->integer('assincronia')->nullable();
            $table->string('inclinacao')->nullable();
            $table->string('viaAerea');
            $table->string('fixacaoRima')->nullable();
            $table->string('pressaoCuff')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('ventPadrao');
    }
}
