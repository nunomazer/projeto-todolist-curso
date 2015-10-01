@extends('layouts.master')
@include('tarefas.submenu')
@section('conteudo')
<h2>
Nova tarefa
</h2>

{!! Form::open(array('url' => 'tarefa/salvar')) !!}
<p>
    {!! Form::label('projeto_id', 'Projeto') !!}<br/>
    {!! Form::select('projeto_id', $projetos) !!}<br/>
</p>
<p>
    {!! Form::label('titulo', 'Título') !!}<br/>
    {!! Form::textarea('titulo') !!}<br/>
    {!! Form::submit('Enviar') !!}
</p>
{!! Form::close() !!}

@stop