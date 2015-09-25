@extends('layouts.master')
@include('projetos.submenu')
@section('conteudo')
<h2>
Projetos
</h2>

@include('layouts.mensagens')

@if ($acao == 'edit')
{!! Form::model($projeto, array('url' => 'projeto/'.$projeto->id, 'method' => 'put', 'class'=>'form-horizontal')) !!}
@else
{!! Form::open(array('url' => 'projeto', 'class'=>'form-horizontal')) !!}
@endif
<fieldset>
    <legend>Projeto</legend>

    <div class="form-group">
        {!! Form::label('titulo', 'Título', ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('titulo', null, ['placeholder'=>'digite o título do projeto', 'class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('data_prazo', 'Prazo', ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('data_prazo', null, ['placeholder'=>'digite a data prazo no formato dd/mm/aaaa', 'class'=>'form-control']) !!}
        </div>
    </div>

    <br/>
    
    <div class="form-group">
        {!! Form::submit('Enviar', ['class'=>'col-sm-2 col-sm-offset-2 btn btn-default']) !!}
    </div>
        
</fieldset>
{!! Form::close() !!}

@stop