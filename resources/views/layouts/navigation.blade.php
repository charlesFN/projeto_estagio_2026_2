<nav x-data="{ open: false }" class="admin-nav">
    <div class="container-fluid admin-main d-flex align-items-center justify-content-between flex-wrap gap-2">
        <a href="{{ route('dashboard') }}" class="navbar-brand d-flex align-items-center gap-2">
            Agenda<span>Pet</span>
        </a>
        <span class="admin-nav__label">
            <form action="{{ route('logout') }}" method="post">
                @csrf

                <input type="submit" value="Logout">
            </form>
        </span>
    </div>
</nav>
