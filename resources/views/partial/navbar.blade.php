<nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="/">Home</a>
                    <a class="nav-link" href="/about">About</a>
                    <a class="nav-link" href="/posts">Blog</a>
                </div>
                @auth()
                    <div class="navbar-nav ms-auto">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Welcome {{ auth()->user()->name }}
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <li><button type="submit" class="dropdown-item">Logout</button></li>
                                </form>
                            </ul>
                        </div>
                    </div>
                @else
                        <div class="navbar-nav ms-auto">
                            <a class="nav-link btn btn-light" href="/login"><i class="bi bi-3-square"></i>Sign In</a>
                        </div>
                @endauth

            </div>
        </div>
    </nav>
</nav>
