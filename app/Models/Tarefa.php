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
}
