<nav class="navbar navbar-expand-lg bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/dashboard" style="color: #14213D;">CREOFIL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About us</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('menu') }}">Menu</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('location') }}">Location</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('event.index') }}">Event</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>