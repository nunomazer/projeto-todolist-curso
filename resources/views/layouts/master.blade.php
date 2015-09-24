<!doctype html>
<html lang="pt_br">
    <head>
        <meta charset="UTF-8">
        <title>Tarefas</title>
        <link href="{!! asset('css/todolist.css') !!}" media="all" rel="stylesheet" type="text/css" />
    </head>
    <body>
        @section('menu')
        <ul class="menu-h">
            <li>
                <a href="<?php echo url('/'); ?>">
                    Home
                </a>
            </li>
            <li>
                <a href="<?php echo url('/tarefa'); ?>">
                    Pendentes
                </a>
            </li>
            <li>
                <a href="<?php echo url('/tarefa/listar-realizadas'); ?>">
                    Realizadas
                </a>
            </li>
            <li>
                <a href="<?php echo url('/tarefa/nova'); ?>">
                    Nova Tarefa
                </a>
            </li>
        </ul>
        @stop
        @yield('menu')
        <hr/>
        <h1>Minhas Tarefas</h1>
        <hr/>
        <div>
            @yield('conteudo')
        </div>
        <hr/>
        <ul class="menu-h footer">
            <li>Prof. Ademir Mazer Jr</li>
            <li>
                <a href="http://ademir.winponta.com.br">
                    Blog
                </a>
            </li>
            <li>
                <a href="http://www.winponta.com.br/moodle">
                    AVA
                </a>
            </li>
        </ul>
    </body>
</html>