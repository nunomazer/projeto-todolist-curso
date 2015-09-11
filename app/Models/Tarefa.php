<?php

namespace Todolist\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model {

    protected $table = "tarefa";
    // Apenas o campo título podera ser inserido por mass insert
    // os demais manipularemos por demanda de ação
    protected $fillable = array('titulo');

    public function getPendentes() {
        return $this->query()->where('realizada', '=', false)->get();
    }
    
    function getRealizadas() {
        return $this->query()->where('realizada', '=', true)->get();
    }
}
