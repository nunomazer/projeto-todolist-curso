<?php

namespace Todolist\Http\Controllers;

use Illuminate\Http\Request;
use Todolist\Http\Requests;
use Todolist\Http\Controllers\Controller;
use Todolist\Models\Projeto;

class ProjetoController extends Controller {

    /**
     * Lista do recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Projeto $projeto) {
        $data['projetos'] = $projeto->all();
        return view('projetos.lista', $data);
    }

    /**
     * Mostra o formulário de criação para um novo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        // passamos a acao para testar a montagem do formulário e utilizamos
        // apensa uma visao de form para criar e editar
        return view('projetos.form', ['acao' => 'create']);
    }

    /**
     * Salva um novo registro para o recurso.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Projeto $projeto) {
        // vamos validar a entrada de dados antes de permitir a tentativa de persistir em banco
        // passamos primeiramente o objeto de request recebido por parâmetro
        // depois passamos um array com as regras de validacao
        // as regras sao o nome do campo => o conjunto de regras
        // veja as regras em http://laravel.com/docs/5.1/validation#available-validation-rules
        // Da forma como estamos fazendo, caso a validação falhe, o Laravel
        // redireciona para a url que chamou esta funcao, caso contrario continua 
        // a execucao do codigo
        // as msg de erro sao adicionadas em uma variavel chamada errors, assim
        // mudaremos a logica de mostrar os erros na visao
        $this->validate($request, [
            'titulo' => 'required|max:100',
            'data_prazo' => 'required|date_format:d/m/Y',
        ]);
        $projeto->create($request->input());
        return redirect('projeto')->with('mensagem-sucesso', 'Projeto incluído com sucesso!');
    }

    /**
     * Mostra um recurso específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        // Implementaremos esta função na sequência
    }

    /**
     * Mostra o formulário de edição para um recurso.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        // em relacao ao exemplo anterior, paramos de copiar e colar esta 
        // logica de pesquisar pelo recurso e mostrar erro caso nao encontre
        // a função findOrError foi criada especificamente para este controlador
        // desmonstrando a possibilidade de usar seu código para melhorar a organização,
        // pois um controlador não é nada mais que uma classe PHP.
        $p = $this->findOrError($id);
        return view('projetos.form', ['projeto' => $p, 'acao' => 'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        // leia os comentarios na funcao store
        $this->validate($request, [
            'titulo' => 'required|max:100',
            'data_prazo' => 'required|date_format:d/m/Y',
        ]);
        $p = $this->findOrError($id);
        $p->fill($r->input());
        $p->save();
        return redirect('projeto')->with('mensagem-sucesso', 'Projeto ' . $id . ' atualizado com sucesso !!');
    }

    /**
     * Rota usada de forma a mostrar uma tela de confirmação da exclusão
     * @param type $id
     */
    public function excluir($id) {
        // em relacao ao exemplo anterior, paramos de copiar e colar esta 
        // logica de pesquisar pelo produto e mostrar erro caso nao encontre
        $p = $this->findOrError($id);
        return view('projetos.excluir', ['projeto' => $p]);
    }

    /**
     * exclui o recurso.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projeto $projeto, $id) {
        $projeto->destroy($id);
        return redirect('projeto')->with('mensagem-sucesso', 'Projeto ' . $id . ' excluído !!');
    }

    /**
     * Pesquisa por um recurso com o $id passado, caso não encontra redireciona 
     * para a url passada e monta o erro com nossa mensagem padrao
     * 
     * Caso encontra o recurso, retorna o modelo correspondente
     * 
     * @param type $id
     */
    private function findOrError($id) {
        $p = Projeto::find($id);
        // se nao encontrar o recurso redireciona para a principal com mensagens de erro
        if ($p == null) {
            // mudamos a forma de retornar mensagens de erros para usar o padrao do Laravel 
            // validators, veja os comentarios na funcao store
            $errors = new \Illuminate\Support\MessageBag(['Projeto de id ' . $id . ' não encontrado !']);
            throw new HttpResponseException($this->redirecionaWithErrors($errors));
        }
        return $p;
    }

    private function redirecionaWithErrors($errors) {
        return redirect('projeto')->withErrors($errors);
    }

}
