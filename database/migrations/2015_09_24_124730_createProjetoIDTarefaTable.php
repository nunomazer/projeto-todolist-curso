<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetoIDTarefaTable extends Migration {

    public function up() {
        Schema::table('tarefa', function ($table) {
            $table->integer('projeto_id')->nullable()->unsigned();

            // Criação do índice de chave estrangeira
            $table->foreign('projeto_id')->references('id')->on('projeto');
        });
    }

    public function down() {
        Schema::table('tarefa', function ($table) {
            $table->dropForeign('projeto_id_foreign');
            $table->dropColumn('projeto_id');
        });
    }

}
