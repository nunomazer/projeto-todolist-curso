@extends('layouts.master')
@include('projetos.submenu')
@section('conteudo')
<h2>
Projetos
</h2>

@include('layouts.mensagens')

<table>
    <thead>
        <th>id</th>
        <th>Título</th>
        <th>Data prazo</th>
    </thead>
@foreach ($projetos as $p)
    <tr>
        <td>{{ $p->id }}</td>
        <td>{{ $p->titulo }}</td>
        <td>{{ $p->data_prazo}}</td>
        <td><a href="{{url('projeto/'.$p->id.'/edit')}}">Editar</a></td>
    </tr>
@endforeach
</table>

@stop
