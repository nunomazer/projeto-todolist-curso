<!doctype html>
<html lang="pt_br">
    <head>
        <meta charset="UTF-8">
        <title>Tarefas</title>
        <link href="{{ asset('css/todolist.css') }}" media="all" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <ul class="menu-h">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('projeto')}}">Projetos</a></li>
            <li><a href="{{url('tarefa')}}">Tarefas</a></li>
            <li><a href="{{url('tag')}}">Tags</a></li>
        </ul>

        <hr/>
        @yield('submenu')

        <hr/>
        <h1>TODOlist</h1>
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
            <li>
                <a href="http://twitter.com/nunomazer">
                    @nunomazer
                </a>
            </li>
        </ul>
    </body>
</html>