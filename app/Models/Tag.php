<?php

namespace Todolist\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    protected $table = 'tag';

    protected $fillable = ['tag'];
    
    /**
     * Retorna as tarefas associadas a uma tag, usando um relacionamento n-n
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tarefas() {
        /**
         * Parâmetros: <br/>
         * Nome da classe modelo com a qual esta se relaciona <br/>
         * Nome da tabela que faz o relacionamento <br/>
         * Nome da chave estrangeira desta classe (Tag) na tabela de relacionamento <br/>
         * Nome da chave estrangeira da 'outra' classe (Tarefa) na tabela de relacionamento <br/>
         */        
        return $this->belongsToMany(Tarefa::class, 'tarefatag', 'tag_id', 'tarefa_id');
    }
}
