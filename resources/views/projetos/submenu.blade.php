@section('submenu')
<!-- Fixed navbar -->
<nav class="navbar navbar navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span class="navbar-brand">Projetos</span>
        </div>

        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo url('/projeto'); ?>">
                        Listar
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('/projeto/create'); ?>">
                        Novo Projeto
                    </a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
@stop