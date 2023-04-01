<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        {{-- <div class="collapse navbar-collapse">
            <li class="navbar-nav">
                <a class="nav-link {{ request()->routeIs('index') ? 'active' : '' }} " href="{{ route('index') }}">V
                    Market Place</a>
            </li>
        </div> --}}
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}">V
                        Market Place</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ request()->routeIs('cart') ? 'active' : '' }}"
                        href="{{ route('cart') }}">Cart</a>
                </li>
                {{-- <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('product') ? 'active' : '' }}" href="{{ route('product') }}">Product</a>
          </li> --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('product', 'category') ? 'active' : '' }}"
                        href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        CRUD
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item " href="{{ route('product') }}">Product</a></li>
                        <li><a class="dropdown-item" href="{{ route('category') }}">Category</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-nav navbar-collapse justify-content-end">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button"
                    data-bs-toggle="dropdown">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item " href="auth/logout">Logout</a></li>
                </ul>
            </li>
        </div>
    </div>
</nav>
