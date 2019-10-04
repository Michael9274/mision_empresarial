<ul class="nav navbar-nav ml-auto">
    <li class="nav-item d-md-down-none">
        <a class="nav-link" href="#">
            <i class="icon-bell"></i>
            <span class="badge badge-pill badge-danger">5</span>
        </a>
    </li>
    <li class="nav-item d-md-down-none">
        <a class="nav-link" href="#">
            <i class="icon-list"></i>
        </a>
    </li>
    <li class="nav-item d-md-down-none">
        <a class="nav-link" href="#">
            <i class="icon-location-pin"></i>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <img class="img-avatar" src="{{ asset('admin/img/avatar.png') }}" alt="admin@bootstrapmaster.com">

        </a>
        <div style="margin-left: -80px;" class="dropdown-menu">
            <div class="dropdown-header text-center">
                <strong>Cuenta</strong>
            </div>
            <a class="dropdown-item" href="{{ route('usuarios.edit', auth()->user()->id) }}">
                <i class="fas fa-user"></i> Perfil</a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-wrench"></i> Configuración</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}">
                <i class="fas  fa-lock"></i> Cerrar sesion</a>
        </div>
    </li>
</ul>
