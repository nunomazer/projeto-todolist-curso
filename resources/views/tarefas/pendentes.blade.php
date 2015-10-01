@extends('layouts.master')
@include('tarefas.submenu')
@section('conteudo')
<h2>
Tarefas pendentes
</h2>

<table>
    <thead>
        <th>id</th>
        <th>Projeto</th>
        <th>Título</th>
        <th>Criada em</th>
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
        <td>{{ $tarefa->created_at }}</td>
        <td>
            <a href="{{ url('tarefa/alterar/'.$tarefa->id) }}">
                alterar
            </a>
        </td>
        <td>
            {!! Form::open(array('url' => 'tarefa/realizar')) !!}
            {!! Form::hidden('id', $tarefa->id) !!}
            {!! Form::submit('marcar realizada') !!}
            {!! Form::close() !!}
        </td>
        <td>
            <a href="{{ url('tarefa/excluir/'.$tarefa->id) }}">
                excluir
            </a>
        </td>
    </tr>
@endforeach
</table>

@stop
