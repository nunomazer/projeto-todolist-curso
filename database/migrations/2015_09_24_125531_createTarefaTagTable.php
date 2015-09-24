<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarefaTagTable extends Migration {

    public function up() {
        Schema::create('tarefatag', function ($table) {
            $table->integer('tarefa_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            $table->foreign('tarefa_id')->references('id')->on('tarefa');
            $table->foreign('tag_id')->references('id')->on('tag');
        });
    }

    public function down() {
        Schema::drop('tarefatag');
    }

}
