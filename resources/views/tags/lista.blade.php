@extends('layouts.master')

@section('conteudo')
<h2>
Tags
</h2>

<table>
    <thead>
        <th>id</th>
        <th>Título</th>
        <th>Criada em</th>
    </thead>
@foreach ($tags as $tag)
    <tr>
        <td>{{ $tag->id }}</td>
        <td>{{ $tag->titulo }}</td>
        <td>{{ $tag->created_at }}</td>
    </tr>
@endforeach
</table>

@stop
