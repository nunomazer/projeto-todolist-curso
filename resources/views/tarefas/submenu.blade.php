@section('submenu')
<ul class="menu-h">
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