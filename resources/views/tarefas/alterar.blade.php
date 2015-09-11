@extends('layouts.master')
@section('conteudo')
<h2>
Alterar tarefa {{$tarefa->id}}
</h2>
<!-- usamos o Form::model para ligar o formulário diretamente ao modelo passado para
a visão, desta maneira os dados são associados diretamente -->
{!! Form::model($tarefa, array('url' => array('tarefa/salvar'))) !!}
<p>
    {!! Form::label('titulo', 'Título') !!}<br/>
    {!! Form::textarea('titulo') !!}<br/>
    {!! Form::hidden('id') !!}<br/>
    {!! Form::submit('Enviar') !!}
</p>
{!! Form::close() !!}

@stop