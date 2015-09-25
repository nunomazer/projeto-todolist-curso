<?php

namespace Todolist\Models;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model {

    protected $table = 'projeto';
    protected $fillable = ['titulo', 'data_prazo'];

    private function getDataPrazoValue() {
        return date('m/d/Y', strtotime($this->attributes['data_prazo']));
    }

    private function setDataPrazoValue($value) {
        $date_parts = explode('/', $value);
        $this->attributes['data_prazo'] = $date_parts[2] . '-' . $date_parts[0] . '-' . $date_parts[1];
    }

    public function tarefas() {
        return $this->hasMany(Tarefa::class, 'projeto_id');
    }
}
