@extends('layouts.master')
@include('projetos.submenu')
@section('conteudo')
<h2 class="page-header">
Projetos
</h2>

@include('layouts.mensagens')

<table class="table table-hover table-striped table-responsive">
    <thead>
        <th>id</th>
        <th>Título</th>
        <th>Data prazo</th>
    </thead>
@foreach ($projetos as $p)
    <tr>
        <td>{{ $p->id }}</td>
        <td>
            <a href="{{url('projeto/'.$p->id)}}">
                {{ $p->titulo }}
            </a>
        </td>
        <td>{{ $p->data_prazo}}</td>
        <td>
            <a href="{{url('projeto/'.$p->id.'/edit')}}" class="btn btn-sm btn-primary">
                Editar
            </a>
        </td>
    </tr>
@endforeach
</table>

@stop
