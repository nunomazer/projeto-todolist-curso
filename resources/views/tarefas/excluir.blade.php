@extends('layouts.master')
@section('conteudo')
<h2>
Excluir tarefa {{$tarefa->id}}
</h2>
<!-- usamos o Form::model para ligar o formulário diretamente ao modelo passado para
a visão, desta maneira os dados são associados diretamente -->
{!! Form::model($tarefa, array('url' => array('tarefa/excluir'))) !!}
<p>
    {!! Form::label('titulo', $tarefa->titulo) !!}<br/>
    {!! Form::hidden('id') !!}<br/>
    {!! Form::submit('Confirmar', array('name'=>'confirmaExclusao')) !!}
    {!! Form::submit('Cancelar', array('name'=>'confirmaExclusao')) !!}
</p>
{!! Form::close() !!}

@stop