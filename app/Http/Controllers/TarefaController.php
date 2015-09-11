<?php

namespace Todolist\Http\Controllers;

use Illuminate\Http\Request;
use Todolist\Http\Requests;
use Todolist\Http\Controllers\Controller;
use Todolist\Models\Tarefa;

class TarefaController extends Controller {

// Carrega do modelo as tarefas pendentes e chama a visão principal
    public function listarPendentes(Tarefa $tarefa) {
        $data['tarefas'] = $tarefa->getPendentes();
        return view('tarefas.pendentes', $data);
    }

    // Carrega do modelo as tarefas realizadas e chama a visão de tarefas realizadas
    public function listarRealizadas(Tarefa $tarefa) {
        $data['tarefas'] = $tarefa->getRealizadas();
        return view('tarefas.realizadas', $data);
    }

    // Apenas monta a visão do formulário de nova tarefa
    public function nova() {
        return view('tarefas.nova');
    }

    // Encontra a tarefa para alterar e monta a visão do formulário de alterar tarefa
    public function alterar(Tarefa $tarefa, $id) {
        // pesquisa a tarefa pelo id passado no parâmetro
        // da url
        $tarefa = $tarefa->find($id);
        if ($tarefa != null) {
            // se o resultado da pesquisa pelo id não for 
            //nulo, retorna a view
            // com o form de alteração
            $data['tarefa'] = $tarefa;
            return view('tarefas.alterar', $data);
        } else {
            // se fornulo o resultado, redireciona 
            // para as tarefas pendentes
            return redirect(url('tarefa'));
        }
    }

    // Salva os dados da tarefa enviados por POST, veja em routes.php
    // Recebe do framework (injeção de dependência) os objetos necessários
    public function salvar(Request $request, Tarefa $tarefa) {
// verifica se existe o parâmetro id, somente existe quando 
        // é para alteração, senão deverá ser criado um novo registro/modelo
        if ($request->has('id')) {
            $tarefa = $tarefa->find($request->get('id'));
            
            if ($tarefa != null) {
                // se encontrou o id da tarefa, altera
                $tarefa->update($request->all());
                
                return redirect('tarefa');
            }
        }
        

        // se chegar neste ponto é por que não realizou o return na alteração
        // então
        // Cria um novo registro no banco de dados com os parâmetros
        // preenchidos no form e enviados pelo Request
        $tarefa->create($request->all());

        // Monta a resposta com redirecionamento para a página principal de tarefas
        return redirect('tarefa');
    }

    // Recebe do framework (injeção de dependência) os objetos necessários
    public function realizar(Request $request, Tarefa $tarefa) {
        // atualiza o registro no banco de dados com os parâmetros
        // preenchidos no form e enviados pelo Request
        $tarefa = $tarefa->find($request->get('id'));

        // altera os atributos necessários para atualizar um modelo
        $tarefa->setAttribute('realizada', true);

        // salva a alteração
        $tarefa->save();

        // Monta a resposta com redirecionamento para a página principal de tarefas
        // O status HTTP 302, padrão do método, significa found = encontrado
        return redirect(url('tarefa'));
    }

    // ação excluir mostra o formulário e exclui o modelo quando 
    // enviada a informação correta
    // o parâmetro id é opcional pois somente é passado
    // quando o request é feito por GET
    public function excluir(Request $request, Tarefa $tarefa, $id = null) {
        
    }

}
