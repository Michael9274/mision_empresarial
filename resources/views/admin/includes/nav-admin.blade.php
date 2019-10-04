<nav class="sidebar-nav">
    <ul class="nav">
        <li class="nav-title">Navegación</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">
                <i class="nav-icon icon-action-undo"></i>Regresar a la web</a>
        </li>

        @if(auth()->user()->hasRoles(['admin']))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('usuarios.index') }}">
                    <i class="nav-icon icon-user"></i> Listado de Usuarios</a>
            </li>
        @endif

        <li class="nav-item">
            <a class="nav-link" href="{{ route('libros.index') }}">
                <i class="nav-icon icon-book-open"></i> Libros</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('alquiler') }}">
                <i class="nav-icon icon-bell"></i> Alquiler</a>
        </li>

    </ul>
</nav>
