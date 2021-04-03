<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a href="/" class="navbar-brand">ONE TO ONE - CRUD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false" href="#">Staff</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{route('staff.create')}}">Formulário</a>
                            <a class="dropdown-item" href="{{route('staff.index')}}">listar</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false" href="#">Products</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{route('product.create')}}">Formulário</a>
                            <a class="dropdown-item" href="{{route('product.index')}}">listar</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>