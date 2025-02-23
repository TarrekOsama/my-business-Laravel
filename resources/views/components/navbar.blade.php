<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">My Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cart</a>
                </li>
                 @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            🛒 Cart <span class="badge bg-danger">0</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white fw-bold" href="#" role="button"
                           data-bs-toggle="dropdown">
                            👤 {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="#">Profile</a>
                            </li>
                            <li>
                                <form action="{{ route('auth.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.login.form') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
