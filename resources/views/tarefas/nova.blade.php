@extends('layouts.master')
@section('conteudo')
<h2>
Nova tarefa
</h2>

{!! Form::open(array('url' => 'tarefa/salvar')) !!}
<p>
    {!! Form::label('titulo', 'Título') !!}<br/>
    {!! Form::textarea('titulo') !!}<br/>
    {!! Form::submit('Enviar') !!}
</p>
{!! Form::close() !!}

@stop