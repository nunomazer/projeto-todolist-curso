<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::resource('/projeto', 'ProjetoController');
Route::controller('/tag/{id?}', 'TagController');

Route::get('/tarefa', 'TarefaController@listarPendentes');
Route::get('tarefa/listar-realizadas', 'TarefaController@listarRealizadas');
Route::get('tarefa/nova', 'TarefaController@nova');
Route::get('tarefa/alterar/{id}', 'TarefaController@alterar');
Route::match(['GET','POST'], 'tarefa/excluir/{id?}', 'TarefaController@excluir');
Route::post('tarefa/salvar', 'TarefaController@salvar');
Route::post('tarefa/realizar', 'TarefaController@realizar');