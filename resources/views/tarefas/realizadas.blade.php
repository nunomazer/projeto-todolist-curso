@extends('layouts.master')
@section('conteudo')
<h2>
Tarefas realizadas
</h2>

<table>
    <thead>
        <th>id</th>
        <th>Título</th>
        <th>Atualizada em</th>
    </thead>
@foreach ($tarefas as $tarefa)
    <tr>
        <td>{{ $tarefa->id }}</td>
        <td>{{ $tarefa->titulo }}</td>
        <td>{{ $tarefa->updated_at }}</td>
    </tr>
@endforeach
</table>

@stop
