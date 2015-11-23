<!doctype html>
<html lang="pt_br">
    <head>
        <meta charset="UTF-8">
        <title>Tarefas</title>
        <link href="{{ asset('css/todolist.css') }}" media="all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" media="all" rel="stylesheet" type="text/css" />

        <script src="{{ asset('/js/jquery-2.1.4.min.js') }}"></script>
        <script src="{{ asset('bootstrap//js/bootstrap.min.js') }}"></script>        
    </head>
    <body>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">TODOlist</a>
                </div>

                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('projeto')}}">Projetos</a></li>
                        <li><a href="{{url('tarefa')}}">Tarefas</a></li>
                        <li><a href="{{url('tag')}}">Tags</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">
            <div style="margin-top: 50px;"/>
            
            @yield('submenu')
            <hr/>
            <div>
                @yield('conteudo')
            </div>
            <hr/>
        </div>
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