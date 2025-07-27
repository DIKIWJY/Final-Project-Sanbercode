<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center">

        <a href="/" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">
                <span class="text-primary">Review</span><span class="text-success">Book</span><span
                    class="text-muted">.</span>
            </h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/book">Book</a></li>
                <li><a href="/genre">Genre</a></li>

                @auth
                    <li><a href="/profile">Profile</a></li>
                @endauth

            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>


        @guest

            <div class="ms-4 d-flex gap-3">
                <a href="/login" class="btn btn-primary btn-sm px-2 py-1">Login</a>
                <a href="/register" class="btn btn-outline-primary btn-sm px-2 py-1">Register</a>
            </div>

        @endguest

        @auth
            <form action="/logout" method="POST">
                @csrf
                <div class="ms-4 d-flex gap-2">
                    <button class="btn btn-danger">Logout</button>
                </div>
            </form>
        @endauth

    </div>
</header>
