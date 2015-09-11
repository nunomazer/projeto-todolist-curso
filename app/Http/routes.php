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

$router->get('/tarefa', 'TarefaController@listarPendentes');
$router->get('tarefa/listar-realizadas', 'TarefaController@listarRealizadas');
$router->get('tarefa/nova', 'TarefaController@nova');
$router->get('tarefa/alterar/{id}', 'TarefaController@alterar');
$router->match(['GET','POST'], 'tarefa/excluir/{id?}', 'TarefaController@excluir');
$router->post('tarefa/salvar', 'TarefaController@salvar');
$router->post('tarefa/realizar', 'TarefaController@realizar');