@extends('layouts.master')
@include('projetos.submenu')
@section('conteudo')
<h2>
Projetos
</h2>

@include('layouts.mensagens')

<h3>Projeto {{$projeto->titulo}}</h3>

<table>
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
