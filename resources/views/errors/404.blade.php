@extends('layouts.master')
@section('conteudo')
<h2>
Erro 404
</h2>

<p>
    O recurso (caminho URL) que você solicitou não foi encontrado no servidor.        
</p>
<p>
    Recurso solicitado <strong>{{Request::url()}}</strong>
</p>
<p>
    Se você usou um caminho do aplicativo, por favor informe o administrador sobre o problema.
</p>

@stop