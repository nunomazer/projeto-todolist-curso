@extends('layouts.master')
@include('projetos.submenu')
@section('conteudo')
<h2 class="page-header">
Projetos
</h2>

@include('layouts.mensagens')

<h3 class="alert alert-info">{{$projeto->titulo}}</h3>

<table class="table table-responsive">
    <caption>
        Tarefas
    </caption>
    <thead>
        <th>id</th>
        <th>Título</th>
        <th>Status</th>
    </thead>
@foreach ($projeto->tarefas as $t)
    <tr>
        <td>{{ $t->id }}</td>
        <td>{{ $t->titulo }}</td>
        <td>
            {{ $t->realizada ? 'Realizada' : 'Pendente' }}
         </td>
    </tr>
@endforeach
</table>

@stop
