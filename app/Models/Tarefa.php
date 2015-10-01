<?php

namespace Todolist\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model {

    protected $table = "tarefa";
    // Apenas o campo título podera ser inserido por mass insert
    // os demais manipularemos por demanda de ação
    protected $fillable = ['titulo', 'projeto_id'];

    public function scopePendentes($query) {
        return $query->where('realizada', '=', false);
    }
    
    public function scopeRealizadas($query) {
        return $query->where('realizada', '=', true);
    }
    
    public function projeto() {
        return $this->belongsTo(Projeto::class, 'projeto_id');
    }
    
    public function tags() {
        /**
         * Parâmetros: <br/>
         * Nome da classe modelo com a qual esta se relaciona <br/>
         * Nome da tabela que faz o relacionamento <br/>
         * Nome da chave estrangeira desta classe (Tarefa) na tabela de relacionamento <br/>
         * Nome da chave estrangeira da 'outra' classe (Tag) na tabela de relacionamento <br/>
         */        
        return $this->belongsToMany(Tag::class, 'tarefatag', 'tarefa_id', 'tag_id');
    }
}
