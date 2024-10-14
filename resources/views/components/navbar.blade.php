<nav class="navbar shadow">
    <div class="container-fluid px-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <a href="{{ route('dashboard') }}" class="navbar-brand"><i
                            class="text-primary bi bi-collection-fill me-2"></i>MGT Tools</a>
                </div>
                <div class="col">
                    <div class="nav justify-content-end">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <input type="submit" value="Logout" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
