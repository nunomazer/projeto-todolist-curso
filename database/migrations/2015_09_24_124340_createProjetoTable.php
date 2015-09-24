<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetoTable extends Migration {

    public function up() {
        Schema::create('projeto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->date('data_prazo');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('projeto');
    }

}
