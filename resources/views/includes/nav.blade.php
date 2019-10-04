<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4">
    <a class="navbar-brand px-5" href="#">Misión Empresarial</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav d-flex justify-content-end">
            <li class="nav-item active mx-3">
                @if(auth()->check())
                    <a class="text-white" href="{{ url('/admin/home') }}">Admin</a>
                @else
                    <a class="text-white" href="{{ url('/login') }}">Entrar</a>
                @endif
            </li>
            <li class="nav-item mx-3">
                @if(auth()->check())
                    <a class="text-white" href="{{ route('logout') }}">Salir</a>
                @else
                    <a class="text-white" href="{{ route('register') }}">Registrarse</a>
                @endif
            </li>
        </ul>
    </div>
</nav>
