@extends('layouts.master')
@include('tarefas.submenu')
@section('conteudo')
<h2>
Tarefas realizadas
</h2>

<table>
    <thead>
        <th>id</th>
        <th>Projeto</th>
        <th>Título</th>
        <th>Atualizada em</th>
    </thead>
@foreach ($tarefas as $tarefa)
    <tr>
        <td>{{ $tarefa->id }}</td>
        <td>
            @if(is_null($tarefa->projeto)==false)
                <a href="{{url('projeto/'.$tarefa->projeto->id)}}">
                    {{ $tarefa->projeto->titulo }}
                </a>
            @endif
        </td>
        <td>{{ $tarefa->titulo }}</td>
        <td>{{ $tarefa->updated_at }}</td>
    </tr>
@endforeach
</table>

@stop
