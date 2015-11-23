<?php

namespace Todolist\Http\Controllers;

use Illuminate\Http\Request;
use Todolist\Http\Requests;
use Todolist\Http\Controllers\Controller;
use Todolist\Models\Tarefa;
use Todolist\Models\Tag;

class TarefaController extends Controller {

    // Carrega do modelo as tarefas pendentes e chama a visão principal
    public function listarPendentes(Tarefa $tarefa) {
        $data['tarefas'] = $tarefa->pendentes()->with('projeto')->get();
        return view('tarefas.pendentes', $data);
    }

    // Carrega do modelo as tarefas realizadas e chama a visão de tarefas realizadas
    public function listarRealizadas(Tarefa $tarefa) {
        $data['tarefas'] = $tarefa->realizadas()->with('projeto')->get();
        return view('tarefas.realizadas', $data);
    }

    // Apenas monta a visão do formulário de nova tarefa
    public function nova() {
        $data['projetos'] = \Todolist\Models\Projeto::lists('titulo', 'id');
        return view('tarefas.nova', $data);
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
            $data['projetos'] = \Todolist\Models\Projeto::lists('titulo', 'id');
            $data['tarefa'] = $tarefa;
            
            // adicionamos a string com a lista de tags para ser mostrada no form de alteração
            // com implode puxamo somente o campo tag e transformamos em uma string
            $data['tags'] = $tarefa->tags()->get()->implode('tag', ', ');

            return view('tarefas.alterar', $data);
        } else {
            // se for nulo o resultado, redireciona 
            // para as tarefas pendentes
            
            return redirect(url('tarefa'));
        }
    }

    // Salva os dados da tarefa enviados por POST, veja em routes.php
    // Recebe do framework (injeção de dependência) os objetos necessários
    public function salvar(Request $request, Tarefa $tarefa) {
        $this->validate($request, [
            'titulo' => 'required',
        ]);

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
        // então cria um novo registro no banco de dados com os parâmetros
        // preenchidos no form e enviados pelo Request.
        // A função create retorna o objeto populado com seu novo ID, que servirá para 
        // associarmos as tags a ele
        $tarefa = $tarefa->create($request->all());


        // Se o formulário enviar tags para associar à tarefa
        // passamos estes dados maiso id da nova tarefa para uma função
        // criada neste controlador, assim poderemos reusar a lógica para a 
        // alteraçõ de tarefas
        if ($request->has('tags')) {
            $this->associarTags($tarefa, $request->get('tags'));
        }

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
        // se o request enviou um parâmetro confirmaExclusao e 
        // o valor é sim destrói o modelo no banco de dados
        if ($request->has('confirmaExclusao')) {
            if ($request->get('confirmaExclusao') == 'Confirmar') {
                $tarefa->destroy(array($request->get('id')));
            }
            // volta para listagem de pendentes
            return redirect(url('tarefa'));
        } else {
            // se não existe um parâmetro confirmaExclusao, 
            // mostra a visão com a pergunta de confirmação
            $data['tarefa'] = $tarefa->find($id);
            return view('tarefas.excluir', $data);
        }
    }

    private function associarTags(Tarefa $tarefa, $tags) {
        // explodir o string de tags em um array
        // primeiro tiramos os espaços da string e forçamos que fiquem minúsculas
        $tags = str_replace(' ', '', $tags);
        $tags = strtolower($tags);
        $tags = explode(',', $tags);

        // verificar se tag existe
        foreach ($tags as $tag) {
            // este método procura por um registro relacionado aos atributos
            // passados pelo array, caso não encontre cria um novo registro 
            // no banco
            $tag = Tag::firstOrCreate(['tag' => $tag]);
        }

        // Esta não é a melhor estratégia neste ponto, pois poderíamos
        // criar um array auxiliar dentro do foreach para pegar os
        // ids criados, mas vamos usar o método abaixo para
        // exemplificar as funcionalidades do framework
        

        // o médoto wherein busca todos os registros existentes em 
        // um array, o que nos retorna todas as tags que precisamos associar 
        // à tarefa. 
        // Coolect cria uma nova coleção, pois estamos tranformando uma colção de objetos eloquent em array, 
        // pegamos este array e transformamos em nova coleção para o método flatten transformar uma coleção multidimensional em simples dimensão
        // assim temos um array com os ids desejados
        $tagsIds = collect(
                Tag::whereIn('tag', $tags)->get(['id'])->toArray()
                )->flatten()->all();
        
        
        // após ter a lista com os ids, basta utilizar o método de "anexar" 
        // relacionamentos à uma tabela. Conseguimos isso pois relacionamos as 
        // tags com belongsToMany tanto no modelo de Tarefas quanto de Tags.        
        $tarefa->tags()->attach($tagsIds);
    }

}
