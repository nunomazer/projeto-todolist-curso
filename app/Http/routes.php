<?php

/*
 * Abaixo uma série de variações de rota são utilizadas para que você
 * possa decidir qual a melhor padronização em seu projeto
*/

Route::get('/', 'HomeController@index');

Route::get('projeto/{id}/excluir', 'ProjetoController@excluir');
Route::resource('/projeto', 'ProjetoController');

Route::controller('/tag/{id?}', 'TagController');

Route::get('/tarefa', 'TarefaController@listarPendentes');
Route::get('tarefa/listar-realizadas', 'TarefaController@listarRealizadas');
Route::get('tarefa/nova', 'TarefaController@nova');
Route::get('tarefa/alterar/{id}', 'TarefaController@alterar');
Route::match(['GET','POST'], 'tarefa/excluir/{id?}', 'TarefaController@excluir');
Route::post('tarefa/salvar', 'TarefaController@salvar');
Route::post('tarefa/realizar', 'TarefaController@realizar');