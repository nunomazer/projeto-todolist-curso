@extends('layouts.master')
@section('conteudo')
<h2>
Erro 500
</h2>

<p>
    Um erro interno no aplicativo ocorreu.
</p>
<p>
    Recurso solicitado <strong>{{Request::url()}}</strong>
</p>
<p>
    Por favor, avise o administrador para que ele seja corrigido o mais breve possivel.
</p>

@stop